@extends('layouts.app')

@section('title', 'Resume - Fajri Yanuar Shiddiq Juanda')

@section('content')
    <!-- Navigation -->
    @include('partials.navbar')

    <section class="pt-32 pb-20 px-4 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <!-- Header Profile -->
            <x-glass-card class="rounded-3xl p-8 mb-12 flex flex-col md:flex-row items-center gap-8 border-primary/20">
                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white/10 shadow-xl shrink-0">
                    <!-- Placeholder/Fallback for Profile Image if not available -->
                   <div class="w-full h-full bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center text-3xl font-bold text-white">
                        FY
                   </div>
                   <!-- Ideally use a real image if available: <img src="{{ asset('images/profile.jpg') }}" alt="Fajri Yanuar" class="w-full h-full object-cover"> -->
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-bold mb-2">Fajri Yanuar Shiddiq Juanda</h1>
                    <p class="text-xl text-primary font-medium mb-4">Full Stack Developer</p>
                    <div class="flex flex-wrap justify-center md:justify-start gap-3 text-sm text-gray-400">
                        <a href="mailto:fajriyanuar1@gmail.com" class="flex items-center gap-1 hover:text-white transition-colors">
                            <i data-lucide="mail" class="w-4 h-4"></i> fajriyanuar1@gmail.com
                        </a>
                        <span class="hidden md:inline">•</span>
                        <a href="https://github.com/fajrijuanda" target="_blank" class="flex items-center gap-1 hover:text-white transition-colors">
                            <i data-lucide="github" class="w-4 h-4"></i> fajrijuanda
                        </a>
                        <span class="hidden md:inline">•</span>
                        <a href="https://linkedin.com/in/fajri-yanuar-shiddiq-juanda-3054502b8" target="_blank" class="flex items-center gap-1 hover:text-white transition-colors">
                            <i data-lucide="linkedin" class="w-4 h-4"></i> LinkedIn
                        </a>
                    </div>
                </div>
                <div class="md:ml-auto">
                    <a href="https://wa.me/6285217861296" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-gradient-to-r from-primary to-accent-purple text-white font-semibold hover:scale-105 transition-transform shadow-lg shadow-primary/20">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                        Hire Me
                    </a>
                </div>
            </x-glass-card>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Main Content (Experience & Projects) -->
                <div class="md:col-span-2 space-y-12">

                    <!-- Experience Section -->
                    <section class="gsap-section">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-primary/20 text-primary"><i data-lucide="briefcase" class="w-6 h-6"></i></div>
                            Work <x-gradient-text>Experience</x-gradient-text>
                        </h2>

                        <div class="relative pl-8 border-l-2 border-white/10 space-y-10">
                            <!-- PT Century Battery -->
                            <div class="relative">
                                <span class="absolute -left-[39px] top-1 w-5 h-5 rounded-full bg-primary border-4 border-slate-950"></span>
                                <x-glass-card class="p-6 rounded-2xl hover:border-primary/30 transition-all group">
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2">
                                        <h3 class="text-xl font-bold group-hover:text-primary transition-colors">PT. Century Battery Indonesia</h3>
                                        <span class="text-sm font-menu text-primary bg-primary/10 px-3 py-1 rounded-full whitespace-nowrap mt-2 sm:mt-0 inline-block text-center w-fit">Feb 2025 - Aug 2025</span>
                                    </div>
                                    <p class="text-lg text-gray-300 font-medium mb-4">Internship (Magang) - IT Support & Development</p>
                                    <ul class="space-y-2 text-gray-400 text-sm list-disc list-inside marker:text-primary">
                                        <li>Maintained and optimized internal IT infrastructure, ensuring 99% uptime during operational hours.</li>
                                        <li>Collaborated with the development team to test and debug internal web applications.</li>
                                        <li>Provided technical support for hardware and software issues across departments.</li>
                                        <li>Assisted in the documentation of IT assets and network configurations.</li>
                                    </ul>
                                </x-glass-card>
                            </div>
                        </div>
                    </section>

                    <!-- Education Section -->
                    <section class="gsap-section">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-accent-purple/20 text-accent-purple"><i data-lucide="graduation-cap" class="w-6 h-6"></i></div>
                            Education <x-gradient-text>History</x-gradient-text>
                        </h2>

                        <div class="relative pl-8 border-l-2 border-white/10 space-y-10">
                            <!-- University -->
                            <div class="relative">
                                <span class="absolute -left-[39px] top-1 w-5 h-5 rounded-full bg-accent-purple border-4 border-slate-950"></span>
                                <x-glass-card class="p-6 rounded-2xl hover:border-accent-purple/30 transition-all group">
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2">
                                        <h3 class="text-xl font-bold group-hover:text-accent-purple transition-colors">Universitas Buana Perjuangan Karawang</h3>
                                        <span class="text-sm font-menu text-accent-purple bg-accent-purple/10 px-3 py-1 rounded-full whitespace-nowrap mt-2 sm:mt-0 inline-block text-center w-fit">2022 - Present</span>
                                    </div>
                                    <p class="text-lg text-gray-300 font-medium mb-2">Bachelor of Informatics Engineering (Teknik Informatika)</p>
                                    <p class="text-gray-400 text-sm">Focusing on Software Engineering, Web Development, and Artificial Intelligence.</p>
                                </x-glass-card>
                            </div>

                            <!-- High School -->
                            <div class="relative">
                                <span class="absolute -left-[39px] top-1 w-5 h-5 rounded-full bg-slate-700 border-4 border-slate-950"></span>
                                <x-glass-card class="p-6 rounded-2xl hover:border-white/30 transition-all group">
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2">
                                        <h3 class="text-xl font-bold group-hover:text-white transition-colors">SMAN 1 Karawang</h3>
                                        <span class="text-sm font-menu text-gray-400 bg-white/5 px-3 py-1 rounded-full whitespace-nowrap mt-2 sm:mt-0 inline-block text-center w-fit">2016 - 2019</span>
                                    </div>
                                    <p class="text-lg text-gray-300 font-medium mb-2">Mathematics and Natural Sciences (MIPA)</p>
                                    <p class="text-gray-400 text-sm">Active in Computer Science Club and various extracurricular activities.</p>
                                </x-glass-card>
                            </div>
                        </div>
                    </section>

                    <!-- Key Projects (Selected) -->
                    <section class="gsap-section">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <div class="p-2 rounded-lg bg-accent-cyan/20 text-accent-cyan"><i data-lucide="folder-star" class="w-6 h-6"></i></div>
                            Selected <x-gradient-text>Projects</x-gradient-text>
                        </h2>

                        <div class="grid gap-6">
                            @foreach($featuredProjects as $project)
                                <a href="{{ route('project.show', $project->slug) }}" class="group">
                                    <x-glass-card class="p-6 rounded-2xl hover:border-accent-cyan/30 transition-all flex flex-col md:flex-row gap-6 items-center md:items-start">
                                        <div class="w-full md:w-48 h-32 rounded-lg overflow-hidden shrink-0 relative">
                                            @if($project->thumbnail)
                                                <img src="{{ asset($project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center text-4xl font-bold text-white/10">
                                                    {{ substr($project->title, 0, 1) }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 text-center md:text-left">
                                            <h3 class="text-xl font-bold mb-2 group-hover:text-accent-cyan transition-colors">{{ $project->title }}</h3>
                                            <p class="text-gray-400 text-sm mb-3 line-clamp-2">{{ $project->description }}</p>
                                            <div class="flex flex-wrap justify-center md:justify-start gap-2">
                                                @foreach(array_slice($project->tags, 0, 3) as $tag)
                                                    <span class="px-2 py-1 rounded text-xs bg-white/5 text-gray-300 border border-white/5">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </x-glass-card>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-4 text-center md:text-left">
                            <a href="{{ route('home') }}#projects" class="text-sm text-primary hover:text-white transition-colors inline-flex items-center gap-1">
                                View Full Portfolio <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </section>
                </div>

                <!-- Sidebar (Skills, Languages, Certificates) -->
                <div class="space-y-8">

                    <!-- Technical Skills -->
                    <section class="gsap-section">
                        <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <i data-lucide="cpu" class="w-5 h-5 text-emerald-400"></i>
                            Technical Skills
                        </h2>
                        <x-glass-card class="p-5 rounded-2xl space-y-6">
                            <div>
                                <h4 class="text-sm font-semibold text-gray-200 mb-3 flex items-center gap-2">
                                    <i data-lucide="code" class="w-4 h-4 text-primary"></i> Languages
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(['PHP', 'JavaScript', 'Dart', 'Go', 'Python', 'SQL'] as $skill)
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-white/5 border border-white/10 hover:border-primary/50 transition-colors cursor-default">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-200 mb-3 flex items-center gap-2">
                                    <i data-lucide="layers" class="w-4 h-4 text-accent-purple"></i> Frameworks
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(['Laravel', 'Vue.js', 'Alpine.js', 'Flutter', 'Tailwind CSS'] as $skill)
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-white/5 border border-white/10 hover:border-accent-purple/50 transition-colors cursor-default">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-200 mb-3 flex items-center gap-2">
                                    <i data-lucide="wrench" class="w-4 h-4 text-accent-cyan"></i> Tools & Others
                                </h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(['Git', 'Docker', 'Filament', 'Figma', 'Linux'] as $skill)
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-white/5 border border-white/10 hover:border-accent-cyan/50 transition-colors cursor-default">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </x-glass-card>
                    </section>

                    <!-- Languages -->
                    <section class="gsap-section">
                        <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <i data-lucide="languages" class="w-5 h-5 text-accent-cyan"></i>
                            Languages
                        </h2>
                        <x-glass-card class="p-5 rounded-2xl space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="font-medium">Indonesia</span>
                                    <span class="text-gray-400">Native</span>
                                </div>
                                <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-emerald-400 to-emerald-600 w-full rounded-full"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="font-medium">English</span>
                                    <span class="text-gray-400">Proficient</span>
                                </div>
                                <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-400 to-blue-600 w-[85%] rounded-full"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="font-medium">Korean</span>
                                    <span class="text-gray-400">Proficient</span>
                                </div>
                                <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-pink-400 to-pink-600 w-[85%] rounded-full"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="font-medium">Japanese</span>
                                    <span class="text-gray-400">Basic</span>
                                </div>
                                <div class="w-full h-2 bg-white/5 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-red-400 to-red-600 w-[25%] rounded-full"></div>
                                </div>
                            </div>
                        </x-glass-card>
                    </section>

                    <!-- Certificates -->
                    <section class="gsap-section">
                        <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                            <i data-lucide="award" class="w-5 h-5 text-accent-purple"></i>
                            Certificates
                        </h2>
                        <x-glass-card class="p-5 rounded-2xl">
                            <p class="text-gray-400 text-sm mb-4">
                                Check out my certifications and achievements on my professional LinkedIn profile.
                            </p>
                            <a href="https://www.linkedin.com/in/fajri-yanuar-shiddiq-juanda-3054502b8/" target="_blank" class="w-full block py-2.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-center text-sm font-semibold transition-colors flex items-center justify-center gap-2">
                                <i data-lucide="linkedin" class="w-4 h-4"></i>
                                View on LinkedIn
                            </a>
                        </x-glass-card>
                    </section>

                    <!-- Download CV -->
                     <section class="gsap-section">
                         <a href="#" class="group w-full block p-4 rounded-xl border border-dashed border-white/20 hover:border-primary/50 text-center transition-all bg-white/5 hover:bg-white/10">
                             <div class="flex flex-col items-center gap-2">
                                 <div class="p-3 rounded-full bg-white/5 group-hover:scale-110 transition-transform">
                                     <i data-lucide="file-down" class="w-6 h-6 text-gray-400 group-hover:text-primary transition-colors"></i>
                                 </div>
                                 <span class="text-sm font-medium text-gray-300 group-hover:text-white">Download CV (PDF)</span>
                             </div>
                         </a>
                     </section>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')
@endsection
