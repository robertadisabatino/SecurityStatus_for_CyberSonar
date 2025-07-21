
document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        disable: function () {
            return window.innerWidth < 926; 
        },
        duration: 1000,
        once: true,
        
        easing: 'ease-in-out',
        offset: 120,
    });
});

if (!window.location.pathname.startsWith('/dashboard')) {
    let links = document.querySelectorAll('.hide-on-welcome');
    // let toggler = document.querySelector('.navbar-toggler');
    links.forEach(link => {
    link.style.display = 'none';
    
    });
    // toggler.style.display = 'none';
}


