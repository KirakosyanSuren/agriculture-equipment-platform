<x-layout.app title="Inventory">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/pages/inventory.css') }}">
    @endpush

{{--    <x-shared.hero--}}
{{--        sub_title="Premium Agricultural Equipment"--}}
{{--        title="Browse Inventory"--}}
{{--        description="Explore tractors, harvesters, seeders and heavy-duty farming machinery built for professional agricultural operations."--}}
{{--    />--}}

    <x-inventory.grid
        :items="$inventories"
        :brands="$brands"
        :equipment_types="$equipment_types"
    />

</x-layout.app>
