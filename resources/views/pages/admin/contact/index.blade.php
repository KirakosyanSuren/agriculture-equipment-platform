<x-admin.layout.admin title="Contact">
    <x-admin.ui.table
        title="Contact List"
        create_link="true"
        link_route="admin.contacts.create"
    >

        <x-slot:thead>
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
            @foreach($contacts as $key => $contact)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $contact->title }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>
                        <span class="status-badge {{ $contact->is_active ? 'success' : 'danger' }}">
                            {{ $contact->is_active ? 'Active' : 'Passive' }}
                        </span>
                    </td>
                    <td class="actions">
                        <x-ui.link
                            route="admin.contacts.edit"
                            class="btn edit-btn"
                            :id="$contact->id"
                        >
                            Edit
                        </x-ui.link>

                        <form
                            action="{{ route('admin.contact.change-status', $contact->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('Patch')

                            <x-ui.button class="status-btn">
                                Change Status
                            </x-ui.button>

                        </form>


                        <form
                            action="{{ route('admin.contacts.destroy', $contact->id) }}"
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
