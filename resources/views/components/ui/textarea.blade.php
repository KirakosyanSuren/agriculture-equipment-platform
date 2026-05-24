@props([
    'label',
    'name',
    'placeholder' => '',
    'rows' => 6,
    'value' => ''
])

<div class="input-group">

    <label for="{{ $name }}">
        {{ $label }}
    </label>

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
         {{
            $attributes->class([
                'input-error' => $errors->has($name)
            ])
        }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="error-text">
            {{ $message }}
        </p>
    @enderror

</div>
