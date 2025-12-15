@extends('layouts.app')

@section('title', 'Fajri Yanuar Shiddiq Juanda - Portfolio')

@section('content')
    <div x-data="{
        activeFilter: 'all',
        projects: {{ Js::from($projects) }},
        categories: {{ Js::from($categories) }},
        get filteredProjects() {
            if (this.activeFilter === 'all') return this.projects;
            if (this.activeFilter === 'featured') return this.projects.filter(p => p.featured);
            return this.projects.filter(p => p.category === this.activeFilter);
        }
    }">
        <!-- Navigation -->
        <nav class="fixed top-0 left-0 right-0 z-50 glass">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-2">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-accent-purple flex items-center justify-center">
                            <i data-lucide="code-2" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="font-semibold text-lg hidden sm:block">Portfolio</span>
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="#projects" class="text-gray-300 hover:text-white transition-colors duration-200">Projects</a>
                        <a href="#rate-card" class="text-gray-300 hover:text-white transition-colors duration-200">Rate Card</a>
                        <a href="#about" class="text-gray-300 hover:text-white transition-colors duration-200">About</a>
                        <a href="#contact" class="text-gray-300 hover:text-white transition-colors duration-200">Contact</a>
                        <a href="https://github.com/fajrijuanda" target="_blank" class="glass-card p-2 rounded-lg hover:border-primary/50 group">
                            <i data-lucide="github" class="w-5 h-5 text-gray-400 group-hover:text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="min-h-screen flex items-center justify-center px-4 pt-20 relative">
            <div class="max-w-5xl mx-auto text-center">
                <!-- Profile Image -->
                <div class="gsap-hero-avatar mb-8 relative inline-block">
                    <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-full bg-gradient-to-br from-primary via-accent-purple to-accent-cyan p-1 animate-glow">
                        <img
                            src="{{ asset('images/profile.png') }}"
                            alt="Fajri Yanuar Shiddiq Juanda"
                            class="w-full h-full rounded-full object-cover"
                        >
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-4 border-slate-900"></div>
                </div>

                <!-- Name & Title -->
                <h1 class="gsap-hero-title text-4xl sm:text-5xl md:text-6xl font-bold mb-4">
                    <span class="text-white">Hi, I'm </span>
                    <span class="gradient-text text-shadow-glow">Fajri Yanuar Shiddiq Juanda</span>
                </h1>

                <p class="gsap-hero-subtitle text-xl sm:text-2xl text-gray-400 mb-8 max-w-3xl mx-auto">
                    Full Stack Developer specializing in
                    <span class="text-primary font-semibold">Cloud & DevOps</span>,
                    <span class="text-accent-purple font-semibold">Web</span>,
                    <span class="text-accent-cyan font-semibold">Mobile</span>, and
                    <span class="text-accent-pink font-semibold">IoT</span> solutions
                </p>

                <!-- CTA Buttons -->
                <div class="gsap-hero-cta flex flex-wrap justify-center gap-4 mb-12">
                    <a href="#projects" class="group relative inline-flex items-center px-8 py-4 rounded-xl bg-gradient-to-r from-primary to-primary-dark text-white font-semibold overflow-hidden neon-glow hover:scale-105 transition-transform duration-300">
                        <span class="relative z-10 flex items-center gap-2">
                            <i data-lucide="folder-open" class="w-5 h-5"></i>
                            View My Work
                        </span>
                    </a>
                    <a href="#contact" class="glass-card px-8 py-4 rounded-xl font-semibold hover:border-primary/50 flex items-center gap-2 hover:scale-105 transition-transform duration-300">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                        Get In Touch
                    </a>
                </div>

                <!-- Tech Stack -->
                <div class="gsap-hero-stack flex flex-wrap justify-center gap-3">
                    @foreach(['Laravel', 'Next.js', 'Nuxt.js', 'Flutter', 'Go', 'Python', 'Docker', 'GCP'] as $tech)
                        <span class="tag px-4 py-2 rounded-full text-sm font-medium text-gray-300">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>

                <!-- Scroll Indicator -->
                <div class="absolute bottom-10 left-0 right-0 flex justify-center animate-float">
                    <a href="#projects" class="flex flex-col items-center text-gray-500 hover:text-white transition-colors">
                        <span class="text-sm mb-2">Scroll to explore</span>
                        <i data-lucide="chevron-down" class="w-6 h-6"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Featured Projects Section -->
        <section id="projects" class="py-20 px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="gsap-section text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                        <span class="gradient-text">Featured Projects</span>
                    </h2>
                    <p class="gsap-section text-gray-400 text-lg max-w-2xl mx-auto">
                        A showcase of my best work across different domains and technologies
                    </p>
                </div>

                <!-- Filter Buttons -->
                <div class="gsap-section flex flex-wrap justify-center gap-3 mb-12">
                    <button
                        @click="activeFilter = 'all'"
                        :class="activeFilter === 'all' ? 'active' : ''"
                        class="filter-btn px-6 py-2 rounded-full text-sm font-medium glass-card hover:border-primary/50 transition-all duration-300"
                    >
                        All Projects
                    </button>
                    <button
                        @click="activeFilter = 'featured'"
                        :class="activeFilter === 'featured' ? 'active' : ''"
                        class="filter-btn px-6 py-2 rounded-full text-sm font-medium glass-card hover:border-primary/50 transition-all duration-300"
                    >
                        ⭐ Featured
                    </button>
                    <template x-for="category in categories" :key="category">
                        <button
                            @click="activeFilter = category"
                            :class="activeFilter === category ? 'active' : ''"
                            class="filter-btn px-6 py-2 rounded-full text-sm font-medium glass-card hover:border-primary/50 transition-all duration-300"
                            x-text="category"
                        ></button>
                    </template>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="project in filteredProjects" :key="project.slug">
                        <a
                            :href="'/project/' + project.slug"
                            class="project-card glass-card rounded-2xl overflow-hidden group gradient-border cursor-pointer block"
                            x-data="{ tilt: null }"
                            x-init="$nextTick(() => {
                                VanillaTilt.init($el, {
                                    max: 8,
                                    speed: 400,
                                    glare: true,
                                    'max-glare': 0.2,
                                    scale: 1.02
                                });
                            })"
                        >
                            <!-- Project Image -->
                            <div class="relative h-48 overflow-hidden">
                                <template x-if="project.thumbnail">
                                    <img :src="'/' + project.thumbnail" :alt="project.title" class="w-full h-full object-cover">
                                </template>
                                <template x-if="!project.thumbnail">
                                    <div class="absolute inset-0">
                                        <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-accent-purple/20"></div>
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="text-6xl font-bold text-white/10" x-text="project.title.charAt(0)"></div>
                                        </div>
                                    </div>
                                </template>
                                <!-- Featured Badge -->
                                <div x-show="project.featured" class="absolute top-4 right-4 bg-gradient-to-r from-primary to-accent-purple px-3 py-1 rounded-full text-xs font-semibold flex items-center gap-1">
                                    <i data-lucide="star" class="w-3 h-3"></i> Featured
                                </div>
                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4 bg-slate-900/80 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-gray-300" x-text="project.category"></div>
                            </div>

                            <!-- Project Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 group-hover:text-primary transition-colors" x-text="project.title"></h3>
                                <p class="text-gray-400 text-sm mb-4 line-clamp-2" x-text="project.description"></p>

                                <!-- Tags -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <template x-for="tag in project.tags.slice(0, 3)" :key="tag">
                                        <span class="tag px-2 py-1 rounded text-xs" x-text="tag"></span>
                                    </template>
                                    <template x-if="project.tags.length > 3">
                                        <span class="text-xs text-gray-500" x-text="'+' + (project.tags.length - 3) + ' more'"></span>
                                    </template>
                                </div>

                                <!-- Action -->
                                <div class="flex items-center text-primary font-medium text-sm group-hover:gap-2 transition-all">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform"></i>
                                </div>
                            </div>
                        </a>
                    </template>
                </div>

                <!-- Empty State -->
                <div x-show="filteredProjects.length === 0" class="text-center py-20">
                    <i data-lucide="folder-x" class="w-16 h-16 mx-auto text-gray-600 mb-4"></i>
                    <p class="text-gray-400 text-lg">No projects found in this category</p>
                </div>
            </div>
        </section>

        <!-- Rate Card Section -->
        <section id="rate-card" class="py-20 px-4 relative">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-[20%] left-[10%] w-72 h-72 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-[20%] right-[10%] w-96 h-96 bg-accent-purple/5 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto relative z-10">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="gsap-section text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                        <span class="gradient-text">Rate Card</span> Services
                    </h2>
                    <p class="gsap-section text-gray-400 text-lg max-w-2xl mx-auto">
                        Transparent pricing for professional development services tailored to your needs
                    </p>
                </div>

                <!-- Pricing Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Basic: Landing Page -->
                    <div class="glass-card rounded-2xl p-6 relative group hover:border-primary/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i data-lucide="layout" class="w-16 h-16 text-primary"></i>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">Landing Page</h3>
                            <p class="text-gray-400 text-sm h-10">Perfect for personal portfolios, simple specialized pages, or event pages.</p>
                        </div>

                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-1">Starting from</div>
                            <div class="text-2xl font-bold gradient-text">Rp 3.000.000</div>
                        </div>

                        <ul class="space-y-3 mb-8 text-sm text-gray-300">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-primary mt-0.5 shrink-0"></i>
                                <span>Modern & Responsive UI</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-primary mt-0.5 shrink-0"></i>
                                <span>SEO Optimization Basic</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-primary mt-0.5 shrink-0"></i>
                                <span>Static Content (No Admin)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-primary mt-0.5 shrink-0"></i>
                                <span>Contact Form Integration</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="code" class="w-4 h-4 text-primary mt-0.5 shrink-0"></i>
                                <span class="text-gray-500">HTML/Tailwind</span>
                            </li>
                        </ul>

                        <a href="https://wa.me/6285217861296?text=Halo%2C%20saya%20tertarik%20dengan%20jasa%20pembuatan%20Landing%20Page" target="_blank" class="w-full block text-center py-3 rounded-xl bg-white/5 hover:bg-primary/20 hover:text-primary transition-all font-medium border border-white/10">
                            Consult Now
                        </a>
                    </div>

                    <!-- New: Company Profile (CMS) -->
                    <div class="glass-card rounded-2xl p-6 relative group hover:border-blue-400/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i data-lucide="panels-top-left" class="w-16 h-16 text-blue-400"></i>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">Company Profile (CMS)</h3>
                            <p class="text-gray-400 text-sm h-10">Dynamic website with Admin Panel to specific content easily.</p>
                        </div>

                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-1">Starting from</div>
                            <div class="text-2xl font-bold text-blue-400">Rp 5.000.000</div>
                        </div>

                        <ul class="space-y-3 mb-8 text-sm text-gray-300">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 mt-0.5 shrink-0"></i>
                                <span>Admin Panel (Manage Content)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 mt-0.5 shrink-0"></i>
                                <span>Blog / News / Gallery Section</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 mt-0.5 shrink-0"></i>
                                <span>Dynamic Database Content</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-blue-400 mt-0.5 shrink-0"></i>
                                <span>Optimized for Business</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="code" class="w-4 h-4 text-blue-400 mt-0.5 shrink-0"></i>
                                <span class="text-gray-500">Laravel / Filament / Next.js</span>
                            </li>
                        </ul>

                        <a href="https://wa.me/6285217861296?text=Halo%2C%20saya%20tertarik%20dengan%20jasa%20pembuatan%20Company%20Profile%20dengan%20CMS" target="_blank" class="w-full block text-center py-3 rounded-xl bg-white/5 hover:bg-blue-400/20 hover:text-blue-400 transition-all font-medium border border-white/10">
                            Consult Now
                        </a>
                    </div>

                    <!-- Medium: Web App -->
                    <div class="glass-card rounded-2xl p-6 relative group hover:border-accent-purple/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i data-lucide="database" class="w-16 h-16 text-accent-purple"></i>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">Web Application</h3>
                            <p class="text-gray-400 text-sm h-10">Custom information systems, management tools, or dashboards.</p>
                        </div>

                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-1">Estimated Price</div>
                            <div class="text-xl font-bold text-accent-purple">Rp 8.000.000 - 10.000.000</div>
                        </div>

                        <ul class="space-y-3 mb-8 text-sm text-gray-300">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-purple mt-0.5 shrink-0"></i>
                                <span>Custom Complex Business Logic</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-purple mt-0.5 shrink-0"></i>
                                <span>Multi-Role Auth Level</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-purple mt-0.5 shrink-0"></i>
                                <span>Rest API Development</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-purple mt-0.5 shrink-0"></i>
                                <span>Complex Data Relations</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="code" class="w-4 h-4 text-accent-purple mt-0.5 shrink-0"></i>
                                <span class="text-gray-500">Laravel / Next.js / React</span>
                            </li>
                        </ul>

                        <a href="https://wa.me/6285217861296?text=Halo%2C%20saya%20tertarik%20dengan%20jasa%20pembuatan%20Web%20Application" target="_blank" class="w-full block text-center py-3 rounded-xl bg-white/5 hover:bg-accent-purple/20 hover:text-accent-purple transition-all font-medium border border-white/10">
                            Consult Now
                        </a>
                    </div>

                    <!-- New: Mobile Application -->
                    <div class="glass-card rounded-2xl p-6 relative group hover:border-emerald-400/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i data-lucide="smartphone" class="w-16 h-16 text-emerald-400"></i>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">Mobile Application</h3>
                            <p class="text-gray-400 text-sm h-10">Native or Cross-platform mobile apps for Android & iOS.</p>
                        </div>

                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-1">Starting from</div>
                            <div class="text-2xl font-bold text-emerald-400">Rp 15.000.000</div>
                        </div>

                        <ul class="space-y-3 mb-8 text-sm text-gray-300">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 mt-0.5 shrink-0"></i>
                                <span>Cross-platform (Android/iOS)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 mt-0.5 shrink-0"></i>
                                <span>Offline Capability</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 mt-0.5 shrink-0"></i>
                                <span>Push Notifications</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 mt-0.5 shrink-0"></i>
                                <span>App Store / Play Store Deploy</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="code" class="w-4 h-4 text-emerald-400 mt-0.5 shrink-0"></i>
                                <span class="text-gray-500">Flutter / React Native</span>
                            </li>
                        </ul>

                        <a href="https://wa.me/6285217861296?text=Halo%2C%20saya%20tertarik%20dengan%20jasa%20pembuatan%20Mobile%20Application" target="_blank" class="w-full block text-center py-3 rounded-xl bg-white/5 hover:bg-emerald-400/20 hover:text-emerald-400 transition-all font-medium border border-white/10">
                            Consult Now
                        </a>
                    </div>

                    <!-- Advanced: IoT & Systems -->
                    <div class="glass-card rounded-2xl p-6 relative group hover:border-accent-cyan/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i data-lucide="cpu" class="w-16 h-16 text-accent-cyan"></i>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">IoT & Integrated Sys</h3>
                            <p class="text-gray-400 text-sm h-10">Hardware integration, realtime monitoring, and smart systems.</p>
                        </div>

                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-1">Starting from</div>
                            <div class="text-2xl font-bold text-accent-cyan">Rp 20.000.000</div>
                        </div>

                        <ul class="space-y-3 mb-8 text-sm text-gray-300">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-cyan mt-0.5 shrink-0"></i>
                                <span>Realtime Data (MQTT/WebSocket)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-cyan mt-0.5 shrink-0"></i>
                                <span>Hardware Integration</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-cyan mt-0.5 shrink-0"></i>
                                <span>Custom Analytics & Alerts</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-cyan mt-0.5 shrink-0"></i>
                                <span>Mobile App Control</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="code" class="w-4 h-4 text-accent-cyan mt-0.5 shrink-0"></i>
                                <span class="text-gray-500">Go / Python / Flutter</span>
                            </li>
                        </ul>

                        <a href="https://wa.me/6285217861296?text=Halo%2C%20saya%20tertarik%20dengan%20solusi%20IoT%20Integration" target="_blank" class="w-full block text-center py-3 rounded-xl bg-white/5 hover:bg-accent-cyan/20 hover:text-accent-cyan transition-all font-medium border border-white/10">
                            Consult Now
                        </a>
                    </div>

                    <!-- Enterprise: SaaS / Cloud -->
                    <div class="glass-card rounded-2xl p-6 relative group hover:border-accent-pink/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <i data-lucide="cloud-lightning" class="w-16 h-16 text-accent-pink"></i>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-white mb-2">SaaS & Cloud</h3>
                            <p class="text-gray-400 text-sm h-10">Scalable platforms, PaaS, or enterprise-grade cloud solutions.</p>
                        </div>

                        <div class="mb-6">
                            <div class="text-sm text-gray-500 mb-1">Starting from</div>
                            <div class="text-2xl font-bold text-accent-pink">Rp 25.000.000</div>
                        </div>

                        <ul class="space-y-3 mb-8 text-sm text-gray-300">
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-pink mt-0.5 shrink-0"></i>
                                <span>Microservices Architecture</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-pink mt-0.5 shrink-0"></i>
                                <span>High Scalability & Performance</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-pink mt-0.5 shrink-0"></i>
                                <span>Payment Gateway Integration</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="check-circle" class="w-4 h-4 text-accent-pink mt-0.5 shrink-0"></i>
                                <span>CI/CD & DevOps Setup</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i data-lucide="code" class="w-4 h-4 text-accent-pink mt-0.5 shrink-0"></i>
                                <span class="text-gray-500">Go / Docker / K8s / GCP</span>
                            </li>
                        </ul>

                        <a href="https://wa.me/6285217861296?text=Halo%2C%20saya%20tertarik%20dengan%20pembuatan%20SaaS%20Platform" target="_blank" class="w-full block text-center py-3 rounded-xl bg-white/5 hover:bg-accent-pink/20 hover:text-accent-pink transition-all font-medium border border-white/10">
                            Consult Now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 px-4">
            <div class="max-w-5xl mx-auto">
                <div class="glass-card rounded-3xl p-8 md:p-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <h2 class="text-3xl sm:text-4xl font-bold mb-6">
                                About <span class="gradient-text">Me</span>
                            </h2>
                            <p class="text-gray-400 mb-6 leading-relaxed">
                                I'm a passionate Full Stack Developer with expertise in building scalable cloud solutions,
                                modern web applications, mobile apps, and IoT systems. I love turning complex problems
                                into simple, elegant solutions.
                            </p>
                            <p class="text-gray-400 mb-8 leading-relaxed">
                                Currently focusing on cloud infrastructure and deployment automation, I've built platforms
                                like <span class="text-primary font-semibold">Hostoo</span> and
                                <span class="text-accent-purple font-semibold">SkyFlow</span> that help developers
                                deploy their applications with ease.
                            </p>

                            <!-- Stats -->
                            <div class="grid grid-cols-4 gap-4">
                                <div class="text-center">
                                    <div class="text-3xl font-bold gradient-text">2+</div>
                                    <div class="text-gray-500 text-sm">Years</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold gradient-text">{{ $projects->count() }}+</div>
                                    <div class="text-gray-500 text-sm">Projects</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold gradient-text">{{ count($categories) }}+</div>
                                    <div class="text-gray-500 text-sm">Domains</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold gradient-text">10+</div>
                                    <div class="text-gray-500 text-sm">Technologies</div>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <!-- Skills Grid -->
                            <div class="grid grid-cols-2 gap-4">
                                @foreach([
                                    ['icon' => 'cloud', 'title' => 'Cloud & DevOps', 'desc' => 'GCP, Docker, CI/CD'],
                                    ['icon' => 'globe', 'title' => 'Web Development', 'desc' => 'Laravel, Next.js, Nuxt'],
                                    ['icon' => 'smartphone', 'title' => 'Mobile Apps', 'desc' => 'Flutter, Ionic'],
                                    ['icon' => 'cpu', 'title' => 'IoT & Systems', 'desc' => 'MQTT, Sensors, Realtime']
                                ] as $skill)
                                    <div class="glass-card p-4 rounded-xl hover:border-primary/30 transition-all">
                                        <i data-lucide="{{ $skill['icon'] }}" class="w-8 h-8 text-primary mb-3"></i>
                                        <h4 class="font-semibold mb-1">{{ $skill['title'] }}</h4>
                                        <p class="text-gray-500 text-sm">{{ $skill['desc'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl sm:text-4xl font-bold mb-4">
                    Let's <span class="gradient-text">Connect</span>
                </h2>
                <p class="text-gray-400 text-lg mb-12">
                    Have a project in mind? Let's build something amazing together.
                </p>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="mailto:fajriyanuar1@gmail.com" class="glass-card px-8 py-4 rounded-xl font-semibold hover:border-primary/50 flex items-center gap-3 hover:scale-105 transition-transform">
                        <i data-lucide="mail" class="w-5 h-5 text-primary"></i>
                        fajriyanuar1@gmail.com
                    </a>
                    <a href="https://wa.me/6285217861296" target="_blank" class="glass-card px-8 py-4 rounded-xl font-semibold hover:border-green-500/50 flex items-center gap-3 hover:scale-105 transition-transform">
                        <i data-lucide="message-circle" class="w-5 h-5 text-green-500"></i>
                        WhatsApp
                    </a>
                    <a href="https://github.com/fajrijuanda" target="_blank" class="glass-card px-8 py-4 rounded-xl font-semibold hover:border-accent-purple/50 flex items-center gap-3 hover:scale-105 transition-transform">
                        <i data-lucide="github" class="w-5 h-5 text-accent-purple"></i>
                        GitHub
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 px-4 border-t border-white/5">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-accent-purple flex items-center justify-center">
                        <i data-lucide="code-2" class="w-4 h-4 text-white"></i>
                    </div>
                    <span class="text-gray-400">© 2025 Fajri Yanuar Shiddiq Juanda</span>
                </div>
                <div class="text-gray-500 text-sm">
                    Built with <span class="text-red-500">❤</span> using Laravel & Tailwind CSS
                </div>
            </div>
        </footer>
    </div>

    <!-- GSAP Animations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Hero animations
            const heroTl = gsap.timeline({ defaults: { ease: 'power3.out' } });

            heroTl
                .from('.gsap-hero-avatar', {
                    duration: 1,
                    y: 50,
                    opacity: 0,
                    scale: 0.8
                })
                .from('.gsap-hero-title', {
                    duration: 0.8,
                    y: 30,
                    opacity: 0
                }, '-=0.5')
                .from('.gsap-hero-subtitle', {
                    duration: 0.8,
                    y: 30,
                    opacity: 0
                }, '-=0.5')
                .from('.gsap-hero-cta', {
                    duration: 0.8,
                    y: 30,
                    opacity: 0
                }, '-=0.5')
                .from('.gsap-hero-stack span', {
                    duration: 0.5,
                    y: 20,
                    opacity: 0,
                    stagger: 0.05
                }, '-=0.3');

            // Section animations on scroll
            gsap.utils.toArray('.gsap-section').forEach(section => {
                gsap.from(section, {
                    scrollTrigger: {
                        trigger: section,
                        start: 'top 80%',
                        toggleActions: 'play none none reverse'
                    },
                    y: 30,
                    opacity: 0,
                    duration: 0.8
                });
            });

            // Project cards animation
            gsap.utils.toArray('.project-card').forEach((card, i) => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: 'top 85%',
                        toggleActions: 'play none none reverse'
                    },
                    y: 50,
                    opacity: 0,
                    duration: 0.6,
                    delay: i * 0.1
                });
            });

            // Reinitialize Lucide icons after Alpine updates
            document.addEventListener('alpine:initialized', () => {
                lucide.createIcons();
            });
        });
    </script>
@endsection
