<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio of Fajri Yanuar Shiddiq Juanda - Full Stack Developer specializing in Cloud, DevOps, Web, Mobile, and IoT solutions.">
    <title>@yield('title', 'Fajri Yanuar Shiddiq Juanda - Portfolio')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: {
                            850: '#0F172A',
                            900: '#0B1120',
                            950: '#060912',
                        },
                        primary: {
                            DEFAULT: '#F97316',
                            light: '#FB923C',
                            dark: '#EA580C',
                        },
                        accent: {
                            purple: '#A855F7',
                            pink: '#EC4899',
                            cyan: '#06B6D4',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace'],
                    },
                    animation: {
                        'blob': 'blob 8s infinite',
                        'blob-slow': 'blob 12s infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'shimmer': 'shimmer 2s linear infinite',
                        'spin-slow': 'spin 3s linear infinite',
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(249, 115, 22, 0.3)' },
                            '100%': { boxShadow: '0 0 40px rgba(249, 115, 22, 0.6)' },
                        },
                        shimmer: {
                            '0%': { backgroundPosition: '-200% 0' },
                            '100%': { backgroundPosition: '200% 0' },
                        },
                        'pulse-glow': {
                            '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                            '50%': { opacity: '0.8', transform: 'scale(1.05)' },
                        },
                    },
                    backdropBlur: {
                        xs: '2px',
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

    <!-- Tilt.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/print.css') }}" media="print">
</head>
<body class="bg-slate-950 text-white font-sans antialiased overflow-x-hidden min-h-screen">
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loader-logo">
            <div class="loader-ring"></div>
            <div class="loader-ring"></div>
            <div class="loader-ring"></div>
            <div class="loader-center">
            <i data-lucide="code-2" class="w-7 h-7 text-white"></i>
        </div>
        </div>
        <p class="loader-text">Loading Portfolio</p>
        <div class="loader-progress">
            <div class="loader-progress-bar"></div>
        </div>
    </div>

    <!-- Custom Cursor -->
    <div class="cursor-dot" id="cursorDot"></div>
    <div class="cursor-outline" id="cursorOutline"></div>

    <!-- Animated Background Blobs -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-primary/30 rounded-full filter blur-[100px] animate-blob opacity-70"></div>
        <div class="absolute top-1/4 -right-20 w-80 h-80 bg-accent-purple/30 rounded-full filter blur-[100px] animate-blob-slow animation-delay-2000 opacity-60"></div>
        <div class="absolute bottom-1/4 left-1/4 w-72 h-72 bg-accent-cyan/20 rounded-full filter blur-[100px] animate-blob animation-delay-4000 opacity-50"></div>
        <div class="absolute -bottom-20 right-1/3 w-96 h-96 bg-accent-pink/20 rounded-full filter blur-[120px] animate-blob-slow opacity-40"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="fixed inset-0 pointer-events-none z-0" style="background-image: radial-gradient(rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 40px 40px;"></div>

    <!-- Main Content -->
    <div class="relative z-10">
        @yield('content')
    </div>

    <!-- Scroll to Top Button -->
    <a href="#"
       x-data="{ show: false }"
       @scroll.window="show = (window.pageYOffset > 500)"
       @click.prevent="window.scrollTo({top: 0, behavior: 'smooth'})"
       x-show="show"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0 translate-y-10"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-300"
       x-transition:leave-start="opacity-100 translate-y-0"
       x-transition:leave-end="opacity-0 translate-y-10"
       x-cloak
       class="fixed bottom-8 right-8 z-50 p-3 rounded-full glass-card border border-white/10 text-primary hover:scale-110 hover:bg-primary/20 transition-all shadow-lg shadow-primary/20 backdrop-blur-md"
       aria-label="Scroll to top">
        <i data-lucide="arrow-up" class="w-6 h-6"></i>
    </a>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
