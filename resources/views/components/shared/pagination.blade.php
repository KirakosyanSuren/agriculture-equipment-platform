@props([
    'items'
])

@if($items->hasPages())

    <div class="pagination">

        {{-- PREVIOUS --}}
        @if($items->onFirstPage())

            <a class="disabled">

                <

            </a>

        @else

            <a href="{{ $items->previousPageUrl() }}">

                <

            </a>

        @endif

        {{-- PAGES --}}
        @foreach($items->links()->elements[0] ?? [] as $page => $url)

            @if($page == $items->currentPage())

                <a class="active">

                    {{ $page }}

                </a>

            @else

                <a href="{{ $url }}">

                    {{ $page }}

                </a>

            @endif

        @endforeach

        {{-- NEXT --}}
        @if($items->hasMorePages())

            <a href="{{ $items->nextPageUrl() }}">

                >

            </a>

        @else

            <a class="disabled">

                >

            </a>

        @endif

    </div>

@endif
