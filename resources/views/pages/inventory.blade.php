<x-layout.app title="Inventory">
    <x-inventory.grid
        :items="$inventories"
        :brands="$brands"
        :equipment_types="$equipment_types"
    />

</x-layout.app>
