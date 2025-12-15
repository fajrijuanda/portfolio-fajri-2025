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
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});

// Re-initialize Lucide icons after Alpine updates
document.addEventListener('alpine:initialized', () => {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});

// Initialize GSAP ScrollTrigger
if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
}
