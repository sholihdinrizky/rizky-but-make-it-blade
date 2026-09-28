// Mark JS as loaded for progressive enhancement
document.documentElement.classList.add('js');

// Mobile menu toggle
const menuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
        const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
        menuBtn.setAttribute('aria-expanded', String(!expanded));
        mobileMenu.classList.toggle('hidden');
        menuBtn.querySelector('.hamburger-icon')?.classList.toggle('hidden');
        menuBtn.querySelector('.close-icon')?.classList.toggle('hidden');
    });
}

// Reveal-on-scroll with IntersectionObserver
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!prefersReducedMotion) {
    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('[data-reveal]').forEach((el) => {
        revealObserver.observe(el);
    });
}

// Load Three.js scene only on pages with [data-scene]
const sceneContainers = document.querySelectorAll('[data-scene]');
if (sceneContainers.length > 0) {
    import('./scene.js')
        .then(({ initScene }) => {
            sceneContainers.forEach((container) => {
                const sceneType = container.dataset.scene;
                initScene(container, sceneType);
            });
        })
        .catch((err) => {
            // WebGL or import failure — fallback already visible
            console.warn('3D scene unavailable, using fallback.', err.message);
        });
}
