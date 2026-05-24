@props([
    'label',
    'name',
    'multiple' => false
])

<div class="file-upload">

    <label class="file-upload-label">

        <input
            type="file"
            name="{{ $name }}"
            class="file-upload-input"
            {{ $multiple ? 'multiple' : '' }}
            {{ $attributes }}
        >

        <div class="file-upload-content">

            <div class="file-upload-icon">
                +
            </div>

            <div class="file-upload-text">

                <h4>
                    Upload {{ $label }}
                </h4>

                <p>
                    Click or drag files here
                </p>

            </div>

        </div>

    </label>

    {{-- FILES --}}
    <div class="selected-files"></div>

</div>
