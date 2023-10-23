document.addEventListener("DOMContentLoaded", function() {
    
    // Navbar behavior
    const navbar = document.querySelector('.navbar-nav');
    window.addEventListener('scroll', () => {
        window.scrollY > 50 ? 
            navbar.classList.add('nav-fixed') : 
            navbar.classList.remove('nav-fixed')
    })

})