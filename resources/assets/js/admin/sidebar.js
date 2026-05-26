const sidebar = document.querySelector('.sidebar');

const overlay = document.querySelector('.sidebar-overlay');

const toggle = document.querySelector('.sidebar-toggle');

const closeBtn = document.querySelector('.sidebar-close');

toggle.addEventListener('click', () => {

    sidebar.classList.add('active');

    overlay.classList.add('active');

});

closeBtn.addEventListener('click', () => {

    sidebar.classList.remove('active');

    overlay.classList.remove('active');

});

overlay.addEventListener('click', () => {

    sidebar.classList.remove('active');

    overlay.classList.remove('active');

});
