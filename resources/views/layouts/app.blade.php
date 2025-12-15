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
    
    <style>
        /* Hide default cursor */
        * {
            cursor: none !important;
        }
        
        /* Custom Cursor Styles */
        .cursor-dot {
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #F97316, #A855F7);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease, width 0.2s ease, height 0.2s ease, background 0.2s ease;
        }
        
        .cursor-dot.hover {
            width: 12px;
            height: 12px;
            background: linear-gradient(135deg, #FB923C, #EC4899);
        }
        
        .cursor-outline {
            width: 40px;
            height: 40px;
            border: 2px solid rgba(249, 115, 22, 0.5);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease-out, width 0.2s ease, height 0.2s ease, border-color 0.2s ease, background 0.2s ease;
        }
        
        .cursor-outline.hover {
            width: 60px;
            height: 60px;
            border-color: rgba(168, 85, 247, 0.6);
            background: rgba(249, 115, 22, 0.1);
        }
        
        .cursor-outline.click {
            transform: translate(-50%, -50%) scale(0.8);
            border-color: #06B6D4;
        }
        
        .cursor-trail {
            width: 6px;
            height: 6px;
            background: rgba(249, 115, 22, 0.4);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9997;
            transform: translate(-50%, -50%);
        }
        
        /* Loading Screen */
        .loading-screen {
            position: fixed;
            inset: 0;
            background: #060912;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        
        .loading-screen.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-logo {
            width: 100px;
            height: 100px;
            position: relative;
            margin-bottom: 30px;
        }
        
        .loader-ring {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 3px solid transparent;
            animation: spin 1.5s linear infinite;
        }
        
        .loader-ring:nth-child(1) {
            border-top-color: #F97316;
            animation-duration: 1.5s;
        }
        
        .loader-ring:nth-child(2) {
            inset: 8px;
            border-right-color: #A855F7;
            animation-duration: 2s;
            animation-direction: reverse;
        }
        
        .loader-ring:nth-child(3) {
            inset: 16px;
            border-bottom-color: #06B6D4;
            animation-duration: 2.5s;
        }
        
        .loader-center {
            position: absolute;
            inset: 24px;
            background: linear-gradient(135deg, #F97316, #A855F7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        .loader-center span {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
        }
        
        .loader-text {
            color: #9CA3AF;
            font-size: 0.875rem;
            margin-bottom: 20px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }
        
        .loader-progress {
            width: 200px;
            height: 3px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .loader-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #F97316, #A855F7, #06B6D4);
            border-radius: 10px;
            animation: loading-progress 1.5s ease-in-out forwards;
        }
        
        @keyframes loading-progress {
            0% { width: 0%; }
            50% { width: 70%; }
            100% { width: 100%; }
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(249, 115, 22, 0.5), 0 0 40px rgba(168, 85, 247, 0.3);
            }
            50% { 
                box-shadow: 0 0 30px rgba(249, 115, 22, 0.7), 0 0 60px rgba(168, 85, 247, 0.5);
            }
        }

        /* Custom Glassmorphism Styles */
        .glass {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glass-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 
                0 8px 32px 0 rgba(0, 0, 0, 0.37),
                inset 0 1px 0 0 rgba(255, 255, 255, 0.1);
        }
        
        .glass-card:hover {
            border-color: rgba(249, 115, 22, 0.4);
            box-shadow: 
                0 8px 32px 0 rgba(249, 115, 22, 0.2),
                0 0 0 1px rgba(249, 115, 22, 0.1),
                inset 0 1px 0 0 rgba(255, 255, 255, 0.15);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #F97316 0%, #A855F7 50%, #06B6D4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .gradient-border {
            position: relative;
        }
        
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, #F97316, #A855F7, #06B6D4);
            -webkit-mask: 
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gradient-border:hover::before {
            opacity: 1;
        }
        
        .neon-glow {
            box-shadow: 
                0 0 5px rgba(249, 115, 22, 0.5),
                0 0 20px rgba(249, 115, 22, 0.3),
                0 0 40px rgba(249, 115, 22, 0.1);
        }
        
        .text-shadow-glow {
            text-shadow: 0 0 20px rgba(249, 115, 22, 0.5);
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #0B1120;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #F97316, #A855F7);
            border-radius: 4px;
        }
        
        /* Tag styles */
        .tag {
            background: rgba(249, 115, 22, 0.1);
            border: 1px solid rgba(249, 115, 22, 0.3);
            transition: all 0.3s ease;
        }
        
        .tag:hover {
            background: rgba(249, 115, 22, 0.2);
            border-color: rgba(249, 115, 22, 0.5);
        }
        
        /* Filter button active state */
        .filter-btn.active {
            background: linear-gradient(135deg, #F97316, #EA580C);
            color: white;
            border-color: transparent;
        }
        
        /* Hide initially for GSAP animation */
        .gsap-hidden {
            opacity: 0;
            transform: translateY(30px);
        }
        
        /* Prose styles for markdown content */
        .prose h2 { color: #F97316; margin-top: 2rem; margin-bottom: 1rem; font-weight: 700; }
        .prose h3 { color: #A855F7; margin-top: 1.5rem; margin-bottom: 0.75rem; font-weight: 600; }
        .prose p { color: #9CA3AF; margin-bottom: 1rem; }
        .prose ul { color: #9CA3AF; margin-left: 1.5rem; list-style-type: disc; }
        .prose li { margin-bottom: 0.5rem; }
        .prose strong { color: #F3F4F6; }
        
        /* Mobile: hide custom cursor */
        @media (max-width: 768px) {
            .cursor-dot, .cursor-outline, .cursor-trail {
                display: none !important;
            }
            * {
                cursor: auto !important;
            }
        }
    </style>
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
    
    <!-- Initialize Scripts -->
    <script>
        // Loading Screen
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('loadingScreen').classList.add('hidden');
            }, 1800);
        });
        
        // Custom Cursor
        const cursorDot = document.getElementById('cursorDot');
        const cursorOutline = document.getElementById('cursorOutline');
        
        let mouseX = 0, mouseY = 0;
        let outlineX = 0, outlineY = 0;
        
        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            
            cursorDot.style.left = mouseX + 'px';
            cursorDot.style.top = mouseY + 'px';
        });
        
        // Smooth outline follow
        function animateOutline() {
            outlineX += (mouseX - outlineX) * 0.15;
            outlineY += (mouseY - outlineY) * 0.15;
            
            cursorOutline.style.left = outlineX + 'px';
            cursorOutline.style.top = outlineY + 'px';
            
            requestAnimationFrame(animateOutline);
        }
        animateOutline();
        
        // Hover effects
        document.addEventListener('mouseover', (e) => {
            if (e.target.matches('a, button, .glass-card, .filter-btn, .tag, [role="button"]')) {
                cursorDot.classList.add('hover');
                cursorOutline.classList.add('hover');
            }
        });
        
        document.addEventListener('mouseout', (e) => {
            if (e.target.matches('a, button, .glass-card, .filter-btn, .tag, [role="button"]')) {
                cursorDot.classList.remove('hover');
                cursorOutline.classList.remove('hover');
            }
        });
        
        // Click effect
        document.addEventListener('mousedown', () => {
            cursorOutline.classList.add('click');
        });
        
        document.addEventListener('mouseup', () => {
            cursorOutline.classList.remove('click');
        });
        
        // Initialize Lucide icons
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
        
        // Initialize GSAP ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);
    </script>
</body>
</html>
