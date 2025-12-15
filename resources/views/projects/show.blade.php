@extends('layouts.app')

@section('title', $project->title . ' - Portfolio')

@section('content')
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Hero Section -->

    <!-- Hero Section -->
    <section class="pt-24 pb-12 px-4">
        <div class="max-w-5xl mx-auto">
            <!-- Breadcrumb -->
            <nav class="mb-8 flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-600"></i>
                <a href="{{ route('home') }}#projects" class="text-gray-400 hover:text-white transition-colors">Projects</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-600"></i>
                <span class="text-primary">{{ $project->title }}</span>
            </nav>

            <!-- Project Header -->
            <div class="flex flex-wrap items-start gap-4 mb-6">
                <!-- Category Badge -->
                <span class="bg-slate-800 text-gray-300 px-4 py-1 rounded-full text-sm">
                    {{ $project->category }}
                </span>
                @if($project->featured)
                    <span class="bg-gradient-to-r from-primary to-accent-purple px-4 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                        <i data-lucide="star" class="w-3 h-3"></i> Featured
                    </span>
                @endif
            </div>

            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6">
                <x-gradient-text>{{ $project->title }}</x-gradient-text>
            </h1>

            <p class="text-xl text-gray-400 mb-8 max-w-3xl">
                {{ $project->description }}
            </p>

            <!-- Tags -->
            <div class="flex flex-wrap gap-3 mb-8">
                @foreach($project->tags as $tag)
                    <span class="tag px-4 py-2 rounded-full text-sm font-medium text-gray-300">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4">
                @if(isset($project->demo_url) && $project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" class="group relative inline-flex items-center px-8 py-4 rounded-xl bg-gradient-to-r from-primary to-primary-dark text-white font-semibold overflow-hidden neon-glow hover:scale-105 transition-transform duration-300">
                        <span class="relative z-10 flex items-center gap-2">
                            <i data-lucide="external-link" class="w-5 h-5"></i>
                            Live Demo
                        </span>
                    </a>
                @endif
                @if(isset($project->github_url) && $project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="glass-card px-8 py-4 rounded-xl font-semibold hover:border-primary/50 flex items-center gap-2 hover:scale-105 transition-transform duration-300">
                        <i data-lucide="github" class="w-5 h-5"></i>
                        View Source
                    </a>
                @endif
                <a href="{{ route('home') }}#projects" class="glass-card px-8 py-4 rounded-xl font-semibold hover:border-gray-500/50 flex items-center gap-2 hover:scale-105 transition-transform duration-300">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    Back to Projects
                </a>
            </div>
        </div>
    </section>

    <!-- Project Preview & Gallery -->
    @php
        // PREFER directory scan if folder exists with images
        $galleryImages = collect([]);
        $folderPath = public_path('images/projects/' . $project->slug);

        // First, try to scan the directory for images
        if (is_dir($folderPath)) {
            $files = scandir($folderPath);
            $imageFiles = array_filter($files, function($file) use ($folderPath) {
                $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']) && is_file($folderPath . '/' . $file);
            });

            if (!empty($imageFiles)) {
                sort($imageFiles);
                $galleryImages = collect($imageFiles)->map(function($file) use ($project) {
                    return (object)[
                        'image_path' => 'images/projects/' . $project->slug . '/' . $file,
                        'alt_text' => $project->title . ' - ' . pathinfo($file, PATHINFO_FILENAME)
                    ];
                });
            }
        }

        // Fallback to database images if directory scan found nothing
        if ($galleryImages->isEmpty() && $project->images->count() > 0) {
            $galleryImages = $project->images;
        }

        // Get default image
        $defaultImage = $project->thumbnail
            ? asset($project->thumbnail)
            : ($galleryImages->count() > 0
                ? asset(is_object($galleryImages->first()) ? $galleryImages->first()->image_path : $galleryImages->first()['image_path'])
                : null);
    @endphp

    <section class="py-12 px-4" x-data="{
        currentIndex: 0,
        images: {{ json_encode($galleryImages->map(fn($img) => ['path' => asset(is_object($img) ? $img->image_path : $img['image_path']), 'alt' => is_object($img) ? ($img->alt_text ?? $project->title) : ($img['alt_text'] ?? $project->title)])->values()) }},
        currentImage: '{{ $defaultImage }}',
        isTransitioning: false,
        selectImage(index) {
            if (this.currentIndex === index || this.isTransitioning) return;
            this.isTransitioning = true;
            this.currentIndex = index;
            setTimeout(() => {
                this.currentImage = this.images[index].path;
                this.isTransitioning = false;
            }, 150);
        },
        next() {
            this.selectImage((this.currentIndex + 1) % this.images.length);
        },
        prev() {
            this.selectImage((this.currentIndex - 1 + this.images.length) % this.images.length);
        }
    }" @keydown.arrow-right.window="next()" @keydown.arrow-left.window="prev()">
        <div class="max-w-5xl mx-auto">
            <!-- Main Preview Image -->
            <x-glass-card class="rounded-3xl overflow-hidden relative group p-0 border-0">
                @if($defaultImage || $galleryImages->count() > 0)
                    <img
                        :src="currentImage"
                        alt="{{ $project->title }}"
                        class="w-full h-auto object-cover transition-all duration-300"
                        :class="isTransitioning ? 'opacity-50 scale-[0.99]' : 'opacity-100 scale-100'"
                    >

                    <!-- Navigation Arrows (only if multiple images) -->
                    @if($galleryImages->count() > 1)
                    <div class="absolute inset-0 flex items-center justify-between px-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <button
                            @click="prev()"
                            class="p-3 rounded-full glass-card hover:bg-white/20 transition-all hover:scale-110 backdrop-blur-sm"
                        >
                            <i data-lucide="chevron-left" class="w-6 h-6 text-white"></i>
                        </button>
                        <button
                            @click="next()"
                            class="p-3 rounded-full glass-card hover:bg-white/20 transition-all hover:scale-110 backdrop-blur-sm"
                        >
                            <i data-lucide="chevron-right" class="w-6 h-6 text-white"></i>
                        </button>
                    </div>

                    <!-- Image Counter Badge -->
                    <div class="absolute bottom-4 right-4 glass-card px-3 py-1.5 rounded-full text-sm font-medium flex items-center gap-2">
                        <i data-lucide="image" class="w-4 h-4 text-primary"></i>
                        <span x-text="(currentIndex + 1) + ' / ' + images.length"></span>
                    </div>
                    @endif
                @else
                    <div class="h-80 bg-gradient-to-br from-primary/20 via-accent-purple/20 to-accent-cyan/20 flex items-center justify-center relative">
                        <!-- Abstract decorative elements -->
                        <div class="absolute inset-0 overflow-hidden">
                            <div class="absolute top-10 left-10 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
                            <div class="absolute bottom-10 right-10 w-40 h-40 bg-accent-purple/10 rounded-full blur-2xl"></div>
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-accent-cyan/10 rounded-full blur-3xl"></div>
                        </div>
                        <div class="text-9xl font-bold text-white/10 relative z-10">{{ substr($project->title, 0, 1) }}</div>
                    </div>
                @endif
            </x-glass-card>

            <!-- Thumbnail Gallery Strip -->
            @if($galleryImages->count() > 1)
            <div class="mt-6">
                <div class="flex items-center gap-3 mb-4">
                    <i data-lucide="images" class="w-5 h-5 text-primary"></i>
                    <span class="text-sm font-medium text-gray-400">Project Gallery</span>
                    <span class="text-xs text-gray-500">({{ $galleryImages->count() }} images)</span>
                </div>

                <div class="flex gap-3 overflow-x-auto pb-3 scrollbar-hide">
                    @foreach($galleryImages as $index => $image)
                        <button
                            @click="selectImage({{ $index }})"
                            class="flex-shrink-0 w-24 h-16 md:w-32 md:h-20 rounded-xl overflow-hidden border-2 transition-all duration-300 focus:outline-none"
                            :class="{{ $index }} === currentIndex
                                ? 'border-primary shadow-lg shadow-primary/30 scale-105'
                                : 'border-white/10 opacity-70 hover:opacity-100 hover:border-white/30'"
                        >
                            <img
                                src="{{ asset(is_object($image) ? $image->image_path : $image['image_path']) }}"
                                alt="{{ is_object($image) ? ($image->alt_text ?? $project->title) : ($image['alt_text'] ?? $project->title) }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </button>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Project Content -->
    <section class="py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <x-glass-card class="rounded-3xl p-8 md:p-12">
                <div class="prose prose-invert prose-lg max-w-none">
                    <h2>Tentang {{ $project->title }}</h2>
                    <p>{{ $project->description }}</p>

                    <h3>Teknologi yang Digunakan</h3>
                    <div class="flex flex-wrap gap-3 not-prose mb-8">
                        @foreach($project->tags as $tag)
                            <span class="tag px-4 py-2 rounded-full text-sm font-medium text-gray-300">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>

                    <h3>Kategori</h3>
                    <p>Proyek ini termasuk dalam kategori <strong>{{ $project->category }}</strong>.</p>
                </div>
            </x-glass-card>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects->count() > 0)
    <section class="py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-2xl font-bold mb-8">
                Related <x-gradient-text>Projects</x-gradient-text>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedProjects as $related)
                    <a href="{{ route('project.show', $related->slug) }}">
                        <x-glass-card class="rounded-2xl overflow-hidden group gradient-border cursor-pointer block p-0 border-0 h-full">
                            <div class="relative h-40 overflow-hidden">
                                @if($related->thumbnail)
                                    <img src="{{ asset($related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-accent-purple/20"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="text-5xl font-bold text-white/10">{{ substr($related->title, 0, 1) }}</div>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold mb-2 group-hover:text-primary transition-colors">{{ $related->title }}</h3>
                                <p class="text-gray-400 text-sm line-clamp-2">{{ $related->description }}</p>
                            </div>
                        </x-glass-card>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Footer -->
    @include('partials.footer')
@endsection
