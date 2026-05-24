@props([
    'brands',
    'equipment_types',
    'action',
    'button_class',
    'form_class'
])

<form id="filter-form" class="{{ $form_class }}" action="{{ route($action) }}">
    <div class="admin-table-search">
        <x-ui.input
            label="Title"
            name="title"
            placeholder="Search Title"
            class="admin-filter-input"
            :value="request('title')"
        />

        <x-ui.select
            label="Brand"
            name="brand_id"
            default_option="All Brands"
            class="admin-filter-input"
            :options="$brands->map(fn($brand) => [
                    'value' => $brand->id,
                    'label' => $brand->name
                ])"
            :value="request('brand_id')"
        />

        <x-ui.select
            label="Equipment Type"
            name="equipment_type_id"
            default_option="All Types"
            class="admin-filter-input"
            :options="$equipment_types->map(fn($equipment_type) => [
                            'value' => $equipment_type->id,
                            'label' => $equipment_type->name
                        ])"
            :value="request('equipment_type_id')"
        />

        <x-ui.input
            label="Minimum Price"
            name="min_price"
            type="number"
            placeholder="Search Price"
            class="admin-filter-input"
            :value="request('min_price')"
        />

        <x-ui.input
            label="Maximum Price"
            name="max_price"
            type="number"
            placeholder="Search Price"
            class="admin-filter-input"
            :value="request('max_price')"
        />
    </div>

    <x-ui.button class="{{ $button_class }}">
        Apply Filters
    </x-ui.button>
</form>
