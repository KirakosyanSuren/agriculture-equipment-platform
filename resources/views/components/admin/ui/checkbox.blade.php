@props([
    'label',
    'name',
    'checked' => false
])

<label class="admin-checkbox">

    <input
        type="checkbox"
        name="{{ $name }}"
        {{ $checked ? 'checked' : '' }}
    >

    <span class="admin-checkbox-ui">

        <span class="admin-checkbox-dot"></span>

    </span>

    <span class="admin-checkbox-label">

        {{ $label }}

    </span>

</label>
