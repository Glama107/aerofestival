window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) {
        nav.classList.add('bg-gray-900');
        nav.classList.remove('bg-gradient-to-b');
    } else {
        nav.classList.remove('bg-gray-900');
        nav.classList.add('bg-gradient-to-b');
    }
});