<x-admin.layout.admin title="Inventory">
    <x-admin.ui.table
        title="Product List"
        create_link="true"
        link_route="admin.inventories.create"
        :model="$inventories"
        filter="true"
    >
        <x-slot:search>
            <x-shared.filter-box
                :brands="$brands"
                :equipment_types="$equipment_types"
                action="admin.inventories.index"
                button_class="create-btn"
                form_class="admin-table-search-form"
            />
        </x-slot:search>

        <x-slot:thead>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Brand</th>
                    <th>Equipment Type</th>
                    <th>Model</th>
                    <th>Serial Number</th>
                    <th>Price</th>
                    <th>Condition</th>
                    <th>Year</th>
                    <th>Hour</th>
                    <th>Engine</th>
                    <th>Transmission</th>
                    <th>Fuel Type</th>
                    <th>Horsepower</th>
                    <th>Location</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
                @foreach($inventories as $inventory)
                    <tr>
                        <td>{{ $inventories->firstItem() + $loop->index }}</td>
                        <td>{{ $inventory->title }}</td>
                        <td>{{ $inventory->slug }}</td>
                        <td>{{ $inventory->brand->name }}</td>
                        <td>{{ $inventory->equipment_type->name }}</td>
                        <td>{{ $inventory->model }}</td>
                        <td>{{ $inventory->serial_number }}</td>
                        <td>$ {{ number_format($inventory->price) }}</td>
                        <td>{{ $inventory->condition }}</td>
                        <td>{{ $inventory->year }}</td>
                        <td>{{ $inventory->hour }}</td>
                        <td>{{ $inventory->engine }}</td>
                        <td>{{ $inventory->transmission }}</td>
                        <td>{{ $inventory->fuel_type }}</td>
                        <td>{{ $inventory->horsepower }}</td>
                        <td>{{ $inventory->location }}</td>

                        <td>
                            <span class="status-badge {{ $inventory->is_featured ? 'success' : 'danger' }}">
                                {{ $inventory->is_featured ? 'Show' : 'Hidden' }}
                            </span>
                        </td>

                        <td class="actions">
                            <x-ui.link
                                route="admin.inventories.edit"
                                class="btn edit-btn"
                                :id="$inventory->id"
                            >
                                Edit
                            </x-ui.link>

                            <form
                                action="{{ route('admin.inventory.change-status', $inventory->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('Patch')

                                <x-ui.button class="status-btn">
                                    Change Featured
                                </x-ui.button>

                            </form>


                            <form
                                action="{{ route('admin.inventories.destroy', $inventory->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <x-ui.button class="delete-btn">
                                    Delete
                                </x-ui.button>

                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </x-slot:tbody>

    </x-admin.ui.table>

</x-admin.layout.admin>
