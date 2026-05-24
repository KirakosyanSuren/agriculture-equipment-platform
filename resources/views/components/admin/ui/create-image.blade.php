@props([
    'name',
    'label' => 'Images',
    'multiple' => '',
])

<div class="admin-file">

    <label class="admin-file-label">

        {{ $label }}

    </label>

    <label class="admin-file-upload">

        <input
            type="file"
            name="{{ $multiple? $name . '[]': $name }}"
            {{ $multiple ? 'multiple' : '' }}
            class="admin-file-input"
            data-action="{{ $multiple }}"
        >

        <span>
            Upload Images
        </span>

    </label>

    <div class="admin-file-preview"></div>

</div>
