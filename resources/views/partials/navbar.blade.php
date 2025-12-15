<nav class="fixed top-0 left-0 right-0 z-50 glass" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-accent-purple flex items-center justify-center">
                        <i data-lucide="code-2" class="w-5 h-5 text-white"></i>
                    </div>
                    <span class="font-semibold text-lg">Portfolio</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Intelligent linking using route helper -->
                <a href="{{ route('home') }}#projects" class="text-gray-300 hover:text-white transition-colors duration-200">Projects</a>
                <a href="{{ route('home') }}#rate-card" class="text-gray-300 hover:text-white transition-colors duration-200">Rate Card</a>
                <a href="{{ route('home') }}#about" class="text-gray-300 hover:text-white transition-colors duration-200">About</a>
                <a href="{{ route('resume') }}" class="text-gray-300 hover:text-white transition-colors duration-200 {{ request()->routeIs('resume') ? 'text-primary font-medium' : '' }}">Resume</a>
                <a href="{{ route('home') }}#contact" class="text-gray-300 hover:text-white transition-colors duration-200">Contact</a>
                <a href="https://github.com/fajrijuanda" target="_blank" class="glass-card p-2 rounded-lg hover:border-primary/50 group">
                    <i data-lucide="github" class="w-5 h-5 text-gray-400 group-hover:text-white"></i>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-300 hover:text-white focus:outline-none">
                    <i x-show="!mobileMenuOpen" data-lucide="menu" class="w-6 h-6"></i>
                    <i x-show="mobileMenuOpen" data-lucide="x" class="w-6 h-6" x-cloak></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden glass border-t border-white/10"
        x-cloak
    >
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="{{ route('home') }}#projects" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-lg text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-colors">Projects</a>
            <a href="{{ route('home') }}#rate-card" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-lg text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-colors">Rate Card</a>
            <a href="{{ route('home') }}#about" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-lg text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-colors">About</a>
            <a href="{{ route('resume') }}" class="block px-3 py-3 rounded-lg text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-colors {{ request()->routeIs('resume') ? 'text-primary bg-white/5' : '' }}">Resume</a>
            <a href="{{ route('home') }}#contact" @click="mobileMenuOpen = false" class="block px-3 py-3 rounded-lg text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-colors">Contact</a>
            <a href="https://github.com/fajrijuanda" target="_blank" class="block px-3 py-3 rounded-lg text-base font-medium text-gray-300 hover:text-white hover:bg-white/5 transition-colors flex items-center gap-2">
                <i data-lucide="github" class="w-5 h-5"></i> GitHub
            </a>
        </div>
    </div>
</nav>
