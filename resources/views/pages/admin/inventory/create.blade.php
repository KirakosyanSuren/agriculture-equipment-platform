<x-admin.shared.form
    route="admin.inventories.index"
    title="Create Product"
>
    <form
        action="{{ route('admin.inventories.store') }}"
        method="POST"
        class="admin-form"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="form-grid">
            {{-- TITLE --}}
            <x-ui.input
                label="Title"
                name="title"
                placeholder="Enter title"
            />

            {{-- SLUG  --}}
            <x-ui.input
                label="Slug"
                name="slug"
                placeholder="Enter slug"
            />
        </div>

        <div class="form-grid">
            {{-- MODEL --}}
            <x-ui.input
                label="Model"
                name="model"
                placeholder="Enter model"
            />

            {{-- SERIAL NUMBER  --}}
            <x-ui.input
                label="Serial Number"
                name="serial_number"
                placeholder="Enter Serial number"
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
            />
        </div>

        <div class="form-grid">
            {{-- PRICE --}}
            <x-ui.input
                label="Price"
                name="price"
                type="number"
                placeholder="Enter price"
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
                        'value' => 'used',
                        'label' => 'Used'
                    ]
                ]"
            />
        </div>

        <div class="form-grid">
            {{-- YEAR --}}
            <x-ui.input
                label="Year"
                name="year"
                type="number"
                placeholder="Enter year"
            />

            {{-- transmission --}}
            <x-ui.input
                label="Hour"
                name="hour"
                type="number"
                placeholder="Enter hour"
            />
        </div>

        <div class="form-grid">
            {{-- ENGINE --}}
            <x-ui.input
                label="Engine"
                name="engine"
                placeholder="Enter engine"
            />

            {{-- TRANSMISSION --}}
            <x-ui.input
                label="Transmission"
                name="transmission"
                placeholder="Enter transmission"
            />
        </div>

        <div class="form-grid">
            {{-- FUEL TYPE --}}
            <x-ui.input
                label="Fuel Type"
                name="fuel_type"
                placeholder="Enter fuel type"
            />

            {{-- HORSEPOWER --}}
            <x-ui.input
                label="Horsepower"
                name="horsepower"
                type="number"
                placeholder="Enter horsepower"
            />
        </div>

        {{-- Short Description --}}

        <x-ui.textarea
            label="Short description"
            name="short_description"
            placeholder="Enter short description"
        />

        {{-- Description --}}
        <x-ui.textarea
            label="description"
            name="description"
            placeholder="Enter description"
        />

        <div class="form-grid">
            {{-- Location --}}
            <x-ui.input
                label="Location"
                name="location"
                placeholder="Enter Location"
            />

            {{-- IS FEATURED --}}
            <x-admin.ui.checkbox
                label="Is Featured"
                name="is_featured"
            />
        </div>

        <x-admin.ui.create-image
            name="images"
            label="Product Images"
            multiple="true"
        />

        <x-ui.button
            class="create-btn"
        >
            Create
        </x-ui.button>


    </form>

    <x-ui.error-alert />

</x-admin.shared.form>
