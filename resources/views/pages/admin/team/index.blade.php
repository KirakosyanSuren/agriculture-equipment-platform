<x-admin.layout.admin title="Members">
    <x-admin.ui.table
        title="Members List"
        create_link="true"
        link_route="admin.members.create"
    >

        <x-slot:thead>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Position</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
            @foreach($members as $key => $member)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->position }}</td>
                    <td>{{ $member->description }}</td>
                    <td>
                        <span class="status-badge {{ $member->is_active ? 'success' : 'danger' }}">
                            {{ $member->is_active ? 'Active' : 'Passive' }}
                        </span>
                    </td>
                    <td class="actions">
                        <x-ui.link
                            route="admin.members.edit"
                            class="btn edit-btn"
                            :id="$member->id"
                        >
                            Edit
                        </x-ui.link>

                        <form
                            action="{{ route('admin.member.change-status', $member->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('Patch')

                            <x-ui.button class="status-btn">
                                Change Status
                            </x-ui.button>

                        </form>


                        <form
                            action="{{ route('admin.members.destroy', $member->id) }}"
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
