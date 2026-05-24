<x-admin.layout.admin title="Brand">
    <x-admin.ui.table
        title="Brands List"
        create_modal="true"
    >

        <x-slot:thead>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
            @foreach($brands as $key => $brand)
               <tr>
                   <td>{{ ++$key }}</td>
                   <td>{{ $brand->name }}</td>
                   <td class="actions">
                       <x-ui.button
                           class="edit-btn open-modal"
                           type="button"
                           data-modal="edit-{{ $brand->id }}"
                       >
                           Edit
                       </x-ui.button>

                       <form
                           action="{{ route('admin.brands.destroy', $brand->id) }}"
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

               <x-admin.shared.admin-modal
                    :modal="'edit-' . $brand->id"
                    :action="route(
                        'admin.brands.update',
                        $brand->id
                    )"
                    :value="$brand->name"
                    method="PATCH"
                    title="Edit Brand"
                    button="Update"
               />

            @endforeach
            </tbody>
        </x-slot:tbody>

    </x-admin.ui.table>

    <x-admin.shared.admin-modal
        modal="create-modal"
        :action="route(
            'admin.brands.store'
        )"
        title="Create Brand"
        button="Create"
    />

</x-admin.layout.admin>
