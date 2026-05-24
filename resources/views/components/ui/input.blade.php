@props([
    'label' => '',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'value' => ''
])

<div class="input-group">

    <label for="{{ $name }}">
        {{ $label }}
    </label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"

        {{
            $attributes->class([
                'input-error' => $errors->has($name)
            ])
        }}
    >

    @error($name)
        <p class="error-text">
            {{ $message }}
        </p>
    @enderror

</div>
