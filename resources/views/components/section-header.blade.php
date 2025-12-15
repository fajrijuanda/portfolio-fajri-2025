@props(['title', 'subtitle' => null, 'align' => 'center'])

<div class="{{ $align === 'center' ? 'text-center' : 'text-left' }} mb-16">
    <h2 class="gsap-section text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
        {{ $slot }}
    </h2>
    @if($subtitle)
        <p class="gsap-section text-gray-400 text-lg max-w-2xl {{ $align === 'center' ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
