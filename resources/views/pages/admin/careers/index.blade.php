<x-admin.layout.admin title="Careers">
    <x-admin.ui.table
        title="Positions List"
        create_link="true"
        link_route="admin.careers.create"
    >

        <x-slot:thead>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Work Type</th>
                    <th>Employment Type</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
            @foreach($careers as $key => $career)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $career->title }}</td>
                    <td>{{ $career->position }}</td>
                    <td>{{ $career->work_type_label }}</td>
                    <td>{{ $career->employment_type_label }}</td>
                    <td>{{ $career->description }}</td>
                    <td>
                        <span class="status-badge {{ $career->is_active ? 'success' : 'danger' }}">
                            {{ $career->is_active ? 'Active' : 'Passive' }}
                        </span>
                    </td>
                    <td class="actions">
                        <x-ui.link
                            route="admin.careers.edit"
                            class="btn edit-btn"
                            :id="$career->id"
                        >
                            Edit
                        </x-ui.link>

                        <form
                            action="{{ route('admin.career.change-status', $career->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('Patch')

                            <x-ui.button class="status-btn">
                                Change Status
                            </x-ui.button>

                        </form>


                        <form
                            action="{{ route('admin.careers.destroy', $career->id) }}"
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
