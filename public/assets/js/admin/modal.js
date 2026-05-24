(() => {

    document
        .querySelectorAll('.open-modal')

        .forEach(button => {
            button.addEventListener('click', () => {

                const modal =
                    document.getElementById(
                        button.dataset.modal
                    );

                modal?.classList.add('active');

            });

        });

    document
        .querySelectorAll('[data-close]')

        .forEach(button => {

            button.addEventListener('click', () => {

                const modal =
                    document.getElementById(
                        button.dataset.close
                    );

                modal?.classList.remove('active');

            });

        });

})();
