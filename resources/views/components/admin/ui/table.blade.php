@props([
    'title',
    'create_modal' => '',
    'create_link' => '',
    'link_route' => '',
    'model' => '',
    'filter' => ''
])

<div class="admin-table">

    {{-- TOP --}}

    <div class="admin-table-top">

        <div>

            <h2>
                {{ $title }}
            </h2>

        </div>

        @if($create_modal)
            <x-ui.button
                class="create-btn open-modal"
                type="button"
                data-modal="create-modal"
            >
                Create
            </x-ui.button>
        @endif

        @if($create_link)
            <x-ui.link
                class="create-btn"
                route="{{ $link_route }}"
            >
                Create
            </x-ui.link>
        @endif

    </div>

    {{-- SEARCH --}}

    @if($filter)
        {{ $search }}
    @endif

    {{-- TABLE --}}

    <div class="admin-table-wrapper">

        <table>

            {{ $thead }}

            {{ $tbody }}

        </table>

    </div>

    {{-- PAGINATION --}}

    @if($model)
        <x-shared.pagination :items="$model" />
    @endif

</div>
