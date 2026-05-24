@props([
    'data'
])

<div class="featured-equipment">

    <h3>
        Featured Equipment
    </h3>

    <div class="featured-equipment-card">

        <img
            src="{{ asset('storage/' . $data->mainImage?->path) }}" alt="{{ $data->title }}"
        >

        <div>

            <h4>
                {{ $data->title }}
            </h4>

            <div class="featured-price">
                $ {{ number_format($data->price) }}
            </div>

        </div>

    </div>

    <x-ui.link
        route="inventory.show"
        :id="$data->slug"
        class="btn btn-primary"
    >
        More Info
    </x-ui.link>

</div>
