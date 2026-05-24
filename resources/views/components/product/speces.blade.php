@props([
    'specs'
])

<div class="inventory-specs">

    <h2>
        Specifications
    </h2>

    <div class="specs-table">

        @foreach($specs as $key => $item)
            <div class="spec-row">
                <span>{{ $key }}</span>
                <strong>{{ $item }}</strong>
            </div>
        @endforeach

    </div>

</div>
