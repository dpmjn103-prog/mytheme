(function () {
    const menuButton = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.main-navigation');

    if (menuButton && menu) {
        menuButton.addEventListener('click', function () {
            const isOpen = menu.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
        });

        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.remove('is-open');
                menuButton.setAttribute('aria-expanded', 'false');
            });
        });
    }

    const revealItems = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealItems.forEach(function (item, index) {
            item.style.transitionDelay = Math.min(index % 4, 3) * 70 + 'ms';
            observer.observe(item);
        });
    } else {
        revealItems.forEach(function (item) {
            item.classList.add('is-visible');
        });
    }
}());
