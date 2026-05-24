@props([
    'modal',
    'action',
    'title' => 'Modal',
    'button' => 'Submit',
    'method' => 'POST',
    'value' => ''
])

<div
    id="{{ $modal }}"
    @class([
        'admin-modal',
        'active' =>
            old('modal') === $modal
    ])
>

    <div
        class="admin-modal-overlay"
        data-close="{{ $modal }}"
    ></div>

    <div class="admin-modal-card">

        {{-- TOP --}}

        <div class="admin-modal-top">

            <h3>
                {{ $title }}
            </h3>

            <button
                type="button"
                class="admin-modal-close"
                data-close="{{ $modal }}"
            >
                ✕
            </button>

        </div>

        {{-- FORM --}}

        <form
            action="{{ $action }}"
            method="POST"
        >

            @csrf

            @if($method !== 'POST')
                @method($method)
            @endif

            <x-ui.input
                type="hidden"
                name="modal"
                value="{{ $modal }}"
            />

            <x-ui.input
                class="modal-input"
                label="Name"
                name="name"
                placeholder="Enter Name"
                :value="old('name', $value)"
            />

            <x-ui.button class="create-btn">
                {{ $button }}
            </x-ui.button>

        </form>

    </div>

</div>
