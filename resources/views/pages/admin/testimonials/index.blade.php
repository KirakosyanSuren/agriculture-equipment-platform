<x-admin.layout.admin title="Testimonials">
    <x-admin.ui.table
        title="Testimonials List"
        create_link="true"
        link_route="admin.testimonials.create"
    >

        <x-slot:thead>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
            @foreach($testimonials as $key => $testimonial)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->description }}</td>
                    <td>
                        <span class="status-badge {{ $testimonial->is_active ? 'success' : 'danger' }}">
                            {{ $testimonial->is_active ? 'Active' : 'Passive' }}
                        </span>
                    </td>
                    <td class="actions">
                        <x-ui.link
                            route="admin.testimonials.edit"
                            class="btn edit-btn"
                            :id="$testimonial->id"
                        >
                            Edit
                        </x-ui.link>

                        <form
                            action="{{ route('admin.testimonial.change-status', $testimonial->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('Patch')

                            <x-ui.button class="status-btn">
                                Change Status
                            </x-ui.button>

                        </form>


                        <form
                            action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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
