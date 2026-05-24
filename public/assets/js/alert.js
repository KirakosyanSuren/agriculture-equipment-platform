const alert =
    document.querySelector('.global-alert');

const alertCloseButton =
    document.querySelector('.global-alert-close');

if (alertCloseButton) {

    alertCloseButton.addEventListener('click', () => {
        alert.remove();
    });

}

if (alert) {

    setTimeout(() => {

        alert.style.opacity = '0';

        alert.style.transform =
            'translateY(-10px)';

        setTimeout(() => {

            alert.remove();

        }, 300);

    }, 4000);

}

