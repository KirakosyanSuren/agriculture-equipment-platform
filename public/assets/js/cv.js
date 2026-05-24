const fileInputs =
    document.querySelectorAll(
        '.file-upload-input'
    );

fileInputs.forEach(input => {

    input.addEventListener('change', () => {

        const wrapper =
            input.closest('.file-upload');

        const filesContainer =
            wrapper.querySelector(
                '.selected-files'
            );

        // CLEAR
        filesContainer.innerHTML = '';

        // FILES
        const files =
            Array.from(input.files);

        files.forEach(file => {

            // FILE URL
            const fileUrl =
                URL.createObjectURL(file);

            // FILE SIZE
            const size =
                (
                    file.size /
                    1024 /
                    1024
                ).toFixed(2);

            // ICON
            let icon = '📄';

            if (
                file.type.includes('image')
            ) {
                icon = '🖼️';
            }

            if (
                file.type.includes('pdf')
            ) {
                icon = '📕';
            }

            if (
                file.type.includes('word')
            ) {
                icon = '📘';
            }

            // ITEM
            const item =
                document.createElement('div');

            item.classList.add(
                'selected-file'
            );

            item.innerHTML = `

                    <a
                        href="${fileUrl}"
                        target="_blank"
                        class="selected-file-left"
                    >

                        <div class="selected-file-icon">

                            ${icon}

                        </div>

                        <div>

                            <h5>
                                ${file.name}
                            </h5>

                            <span>
                                ${size} MB
                            </span>

                        </div>

                    </a>

                `;

            // APPEND
            filesContainer.appendChild(
                item
            );

        });

    });

});

