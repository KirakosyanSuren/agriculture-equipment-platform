const fileInput =
    document.querySelector('.admin-file-input');

const preview =
    document.querySelector('.admin-file-preview');

let selectedFiles = [];
let actionSection = '';
let action = ''

// CHANGE

fileInput.addEventListener('change', (e) => {

    action = e.target.dataset.action

    const files =
        Array.from(e.target.files);

    // ADD NEW FILES
    if(action === 'true') {

        selectedFiles = [
            ...selectedFiles,
            ...files
        ];

    } else {

        selectedFiles = files;

    }

    renderImages();

});

// RENDER

function renderImages() {

    preview.innerHTML = '';

    selectedFiles.forEach((file, index) => {

        if(action) {
            actionSection = `<label class="admin-file-main">

                    <input
                        type="radio"
                        name="is_main"
                        value="${index}"
                    >

                    <span class="admin-file-main-ui"></span>

                    <span>
                        Main Image
                    </span>

                </label>`
        }

        // CREATE URL
        const imageUrl =
            URL.createObjectURL(file);

        // CREATE ITEM
        const item =
            document.createElement('div');

        item.classList.add(
            'admin-file-item'
        );

        item.innerHTML = `

                <img src="${imageUrl}">

                <button
                    type="button"
                    class="admin-file-remove"
                    data-index="${index}"
                >
                    ✕
                </button>

                ${actionSection}

            `;

        preview.appendChild(item);

    });

    updateInputFiles();

}

// REMOVE IMAGE

preview.addEventListener('click', (e) => {

    if (
        e.target.classList.contains(
            'admin-file-remove'
        )
    ) {

        const index =
            Number(
                e.target.dataset.index
            );

        // REMOVE FILE
        selectedFiles.splice(index, 1);

        // RE-RENDER
        renderImages();

    }

});

// UPDATE INPUT FILES

function updateInputFiles() {

    const dataTransfer =
        new DataTransfer();

    selectedFiles.forEach(file => {

        dataTransfer.items.add(file);

    });

    fileInput.files =
        dataTransfer.files;

}

