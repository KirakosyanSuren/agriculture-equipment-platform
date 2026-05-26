@props([
    'items',
    'brands',
    'equipment_types'
])

<section class="inventory-section">
    <div class="container">

        <div class="inventory-layout">

            <!-- FILTER -->

            <x-shared.filter-box
                :brands="$brands"
                :equipment_types="$equipment_types"
                action="inventory"
                button_class="btn-primary"
                form_class="filter-box"
            />

            <!-- INVENTORY CONTENT -->

            <div>
                <div class="inventory-top">
                    <div>
                        <h2>Inventory</h2>
                        <p>Showing {{ $items->count() }} agricultural machines</p>
                    </div>

                </div>

                <x-shared.inventory-card-section :items="$items" />

               <x-shared.pagination :items="$items" />

            </div>

        </div>

    </div>

</section>
