<x-admin.layout.admin title="Equipment Type">
    <x-admin.ui.table
        title="Equipment Types List"
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
            @foreach($equipment_types as $key => $equipment_type)
               <tr>
                   <td>{{ ++$key }}</td>
                   <td>{{ $equipment_type->name }}</td>
                   <td class="actions">
                       <x-ui.button
                           class="edit-btn open-modal"
                           type="button"
                           data-modal="edit-{{ $equipment_type->id }}"
                       >
                           Edit
                       </x-ui.button>

                       <form
                           action="{{ route('admin.equipment-types.destroy',$equipment_type) }}"
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
                    :modal="'edit-' . $equipment_type->id"
                    :action="route(
                        'admin.equipment-types.update',
                        $equipment_type->id
                    )"
                    :value="$equipment_type->name"
                    method="PATCH"
                    title="Edit Equipment Type"
                    button="Update"
               />

            @endforeach
            </tbody>
        </x-slot:tbody>

    </x-admin.ui.table>

    <x-admin.shared.admin-modal
        modal="create-modal"
        :action="route(
            'admin.equipment-types.store'
        )"
        title="Create Equipment Type"
        button="Create"
    />

</x-admin.layout.admin>
