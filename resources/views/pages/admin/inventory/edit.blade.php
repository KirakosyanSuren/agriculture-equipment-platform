<x-admin.shared.form
    route="admin.inventories.index"
    title="Edit Product"
>
    <form
        action="{{ route('admin.inventories.update', $inventory->id) }}"
        method="POST"
        class="admin-form"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="form-grid">
            {{-- TITLE --}}
            <x-ui.input
                label="Title"
                name="title"
                placeholder="Enter title"
                :value="$inventory->title"
            />

            {{-- SLUG  --}}
            <x-ui.input
                label="Slug"
                name="slug"
                placeholder="Enter slug"
                :value="$inventory->slug"
            />
        </div>

        <div class="form-grid">
            {{-- MODEL --}}
            <x-ui.input
                label="Model"
                name="model"
                placeholder="Enter model"
                :value="$inventory->model"
            />

            {{-- SERIAL NUMBER  --}}
            <x-ui.input
                label="Serial Number"
                name="serial_number"
                placeholder="Enter Serial number"
                :value="$inventory->serial_number"
            />
        </div>

        <div class="form-grid">
            {{-- TITLE --}}
            <x-ui.select
                label="Brand"
                name="brand_id"
                default_option="All Brands"
                :options="$brands->map(fn($brand) => [
                    'value' => $brand->id,
                    'label' => $brand->name
                ])"
                :value="$inventory->brand->id"
            />

            {{-- EQUIPMENT TYPE  --}}
            <x-ui.select
                label="Equipment Type"
                name="equipment_type_id"
                default_option="All Types"
                :options="$equipment_types->map(fn($equipment_type) => [
                    'value' => $equipment_type->id,
                    'label' => $equipment_type->name
                ])"
                :value="$inventory->equipment_type->id"
            />
        </div>

        <div class="form-grid">
            {{-- PRICE --}}
            <x-ui.input
                label="Price"
                name="price"
                type="number"
                placeholder="Enter price"
                :value="$inventory->price"
            />

            {{-- Condition  --}}
            <x-ui.select
                label="Condition"
                name="condition"
                default_option="All Conditions"
                :options="[
                    [
                        'value' => 'new',
                        'label' => 'New'
                    ],
                    [
                        'value' => 'user',
                        'label' => 'Used'
                    ]
                ]"
                :value="$inventory->condition"
            />
        </div>

        <div class="form-grid">
            {{-- YEAR --}}
            <x-ui.input
                label="Year"
                name="year"
                type="number"
                placeholder="Enter year"
                :value="$inventory->year"
            />

            {{-- transmission --}}
            <x-ui.input
                label="Hour"
                name="hour"
                type="number"
                placeholder="Enter hour"
                :value="$inventory->hour"
            />
        </div>

        <div class="form-grid">
            {{-- ENGINE --}}
            <x-ui.input
                label="Engine"
                name="engine"
                placeholder="Enter engine"
                :value="$inventory->engine"
            />

            {{-- TRANSMISSION --}}
            <x-ui.input
                label="Transmission"
                name="transmission"
                placeholder="Enter transmission"
                :value="$inventory->transmission"
            />
        </div>

        <div class="form-grid">
            {{-- FUEL TYPE --}}
            <x-ui.input
                label="Fuel Type"
                name="fuel_type"
                placeholder="Enter fuel type"
                :value="$inventory->fuel_type"
            />

            {{-- HORSEPOWER --}}
            <x-ui.input
                label="Horsepower"
                name="horsepower"
                type="number"
                placeholder="Enter horsepower"
                :value="$inventory->horsepower"
            />
        </div>

        {{-- Short Description --}}

        <x-ui.textarea
            label="Short description"
            name="short_description"
            placeholder="Enter short description"
            :value="$inventory->short_description"
        />

        {{-- Description --}}
        <x-ui.textarea
            label="description"
            name="description"
            placeholder="Enter description"
            :value="$inventory->description"
        />

        <div class="form-grid">
            {{-- Location --}}
            <x-ui.input
                label="Location"
                name="location"
                placeholder="Enter Location"
                :value="$inventory->location"
            />

            {{-- IS FEATURED --}}
            <x-admin.ui.checkbox
                label="Is Featured"
                name="is_featured"
                :checked="$inventory->is_featured"
            />
        </div>

        <x-admin.ui.edit-image
            name="images"
            label="Product Images"
            image-actions="true"
            multiple="true"
            :images="$inventory->images"
            :main-image-id="$inventory->mainImage?->id"
        />

        <x-ui.button
            class="create-btn"
        >
            Update
        </x-ui.button>
    </form>

</x-admin.shared.form>
