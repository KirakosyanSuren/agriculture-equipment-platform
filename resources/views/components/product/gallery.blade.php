@props([
    'data'
])

<div class="inventory-gallery">

    {{-- MAIN IMAGE --}}
    <div class="inventory-main-image">

        <img
            id="inventory-main-image"
            src="{{ asset('storage/' . $data->mainImage?->path) }}"
        >

    </div>

    {{-- THUMBS --}}
    <div class="inventory-thumbs">

        {{-- MAIN IMAGE --}}
        @if($data->mainImage)

            <div
                class="inventory-thumb active"
                data-image="{{ asset('storage/' . $data->mainImage?->path) }}"
            >

                <img
                    src="{{ asset('storage/' . $data->mainImage?->path) }}"
                    alt=""
                >

            </div>

        @endif

        {{-- OTHER IMAGES --}}
        @foreach($data->images as $image)

            @continue(
                $data->mainImage &&
                $data->mainImage->id === $image->id
            )

            <div
                class="inventory-thumb"
                data-image="{{ asset('storage/' . $image->path)  }}"
            >

                <img
                    src="{{ asset('storage/' . $image->path) }}"
                    alt=""
                >

            </div>

        @endforeach

    </div>

</div>
