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
});
