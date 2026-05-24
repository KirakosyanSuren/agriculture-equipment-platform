@props([
    'img',
    'name',
    'alt' => '',
    'specs' => [],
    'description',
    'price',
    'route' => null,
    'id' => null
])

<div class="inventory-card">

    <div class="inventory-image">
        <img src="{{ $img }}" alt="{{ $alt }}">
    </div>

    <div class="inventory-content">

        <h4>{{ $name }}</h4>

        <div class="specs">
            @foreach($specs as $spec)
                <div class="spec">{{ $spec }}</div>
            @endforeach
        </div>

        <p>
            {{ $description }}
        </p>

        <div class="price">
            $ {{ number_format($price) }}
        </div>

{{--        <x-ui.link--}}
{{--            :href="$route"--}}
{{--            :id="$id"--}}
{{--            class="btn btn-primary"--}}
{{--        >--}}
{{--            More Info--}}
{{--        </x-ui.link>--}}

        <x-ui.link
            :route="$route"
            :id="$id"
            class="btn btn-primary"
        >
            More Info
        </x-ui.link>

    </div>

</div>
