document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('[data-reveal]');

    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.18,
        });

        revealElements.forEach((element) => {
            revealObserver.observe(element);
        });
    } else {
        revealElements.forEach((element) => {
            element.classList.add('is-visible');
        });
    }

    const parallaxElements = document.querySelectorAll('[data-parallax]');

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || parallaxElements.length === 0) {
        return;
    }

    const updateParallax = (event) => {
        const offsetX = (event.clientX / window.innerWidth) - 0.5;
        const offsetY = (event.clientY / window.innerHeight) - 0.5;

        parallaxElements.forEach((element) => {
            const speed = Number(element.getAttribute('data-parallax-speed') ?? 20);
            const translateX = offsetX * speed;
            const translateY = offsetY * speed;

            element.style.transform = `translate3d(${translateX}px, ${translateY}px, 0)`;
        });
    };

    window.addEventListener('pointermove', updateParallax, {
        passive: true,
    });
});
