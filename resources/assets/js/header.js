const burger = document.getElementById('burger');
const navLinks = document.getElementById('navLinks');

burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    navLinks.classList.toggle('active');
});

/* MOBILE DROPDOWN */

document.querySelectorAll('.dropdown-toggle').forEach(toggle => {

    toggle.addEventListener('click', function(e){

        if(window.innerWidth <= 1200){

            e.preventDefault();

            this.parentElement.classList.toggle('active');
        }

    });

});
