@props([
    'items'
])

<div class="inventory-grid">
    @foreach($items as $item)
        <x-shared.inventory-card
            :img="asset('storage/' . $item->mainImage?->path)"
            :name="$item->title"
            :description="$item->short_description"
            :price="$item->price"
            route="inventory.show"
            :id="$item->slug"
            :specs="[
                $item->serial_number,
                $item->brand->name,
                $item->equipment_type->name,
                $item->model,
                $item->condition,
                $item->year,
                $item->hour,
                $item->horsepower . 'HP',
                $item->engine,
                $item->transmission,
                $item->fuel_type,
                $item->location
            ]"
        />
    @endforeach


</div>

