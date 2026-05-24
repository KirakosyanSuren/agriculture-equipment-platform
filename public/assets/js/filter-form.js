document
    .getElementById('filter-form')
    ?.addEventListener('submit', function () {

        this.querySelectorAll('input, select')
            .forEach(field => {

                if (!field.value) {
                    field.removeAttribute('name');
                }

            });

    });
