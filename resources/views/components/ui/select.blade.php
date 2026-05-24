@props([
    'label',
    'name' => '',
    'default_option' => '',
    'options' => [],
    'value' => ''
])

<div
    {{
        $attributes->class([
            'input-group'
        ])
    }}
>

    <label>
        {{ $label }}
    </label>

    <select
        name="{{ $name }}"
        class="{{ $errors->has($name) ? 'input-error' : '' }}"
    >

        @if($default_option)

            <option value="">
                {{ $default_option }}
            </option>

        @endif

        @foreach($options as $option)

            <option
                value="{{ $option['value'] }}"
                @selected(old($name, $value) == $option['value'])
            >
                {{ $option['label'] }}
            </option>

        @endforeach


    </select>

    @error($name)
        <p class="error-text">
            {{ $message }}
        </p>
    @enderror

</div>
