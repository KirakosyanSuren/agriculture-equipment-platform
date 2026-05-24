@props([
    'name' => 'images',
    'label' => 'Images',
    'images' => [],
    'mainImageId' => null,
    'imageActions' => '',
    'multiple' => ''
])

<div class="admin-file">

    <label class="admin-file-label">

        {{ $label }}

    </label>

    {{-- EXISTING IMAGES --}}

    @if(count($images))

        <div class="new-admin-file-preview">

            @foreach($images as $image)

                <div class="admin-file-item">

                    <img
                        src="{{ asset('storage/' . $image->path) }}"
                    >
                    @if($imageActions)

                        <div class="admin-file-actions">

                            {{-- MAIN IMAGE --}}
                            <label>

                                    <input
                                        type="radio"
                                        name="is_main"
                                        value="{{ $image->id }}"
                                        @checked($mainImageId == $image->id)
                                    >
                                Main

                            </label>

                            {{-- DELETE IMAGE --}}

                            <label>
                                <input
                                    type="checkbox"
                                    name="deleted_images[]"
                                    value="{{ $image->id }}"
                                >

                                Delete

                            </label>

                        </div>

                    @endif


                </div>

            @endforeach

        </div>

    @endif

    {{-- NEW IMAGES --}}

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

    {{-- NEW IMAGE PREVIEW --}}

    <div class="admin-file-preview"></div>

</div>


