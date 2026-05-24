@props([
    'route',
    'title'
])

<x-admin.layout.admin title="{{ $title }}">

    <x-ui.link
        route="{{ $route }}"
        class="back-btn"
    >
        Back
    </x-ui.link>

    <div class="admin-form-page">

        <div class="admin-page-top">

            <div>

                <h2>
                    {{ $title }}
                </h2>

            </div>

        </div>

        {{ $slot }}

    </div>

</x-admin.layout.admin>
