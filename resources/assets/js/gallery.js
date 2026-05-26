document.addEventListener(
    'DOMContentLoaded',
    () => {

        const mainImage =
            document.getElementById(
                'inventory-main-image'
            );

        const thumbs =
            document.querySelectorAll(
                '.inventory-thumb'
            );

        thumbs.forEach(thumb => {

            thumb.addEventListener(
                'click',
                () => {

                    thumbs.forEach(item => {

                        item.classList.remove(
                            'active'
                        );

                    });

                    thumb.classList.add(
                        'active'
                    );

                    mainImage.src =
                        thumb.dataset.image;

                }
            );

        });

    }
);
