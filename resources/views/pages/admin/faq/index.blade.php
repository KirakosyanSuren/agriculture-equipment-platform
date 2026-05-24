<x-admin.layout.admin title="Faq">
    <x-admin.ui.table
        title="Faq List"
        create_link="true"
        link_route="admin.faqs.create"
    >

        <x-slot:thead>
            <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Sort Order</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
        </x-slot:thead>

        <x-slot:tbody>
            <tbody>
            @foreach($faqs as $key => $faq)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td>
                    <td>{{ $faq->sort_order }}</td>
                    <td>
                        <span class="status-badge {{ $faq->is_active ? 'success' : 'danger' }}">
                            {{ $faq->is_active ? 'Active' : 'Passive' }}
                        </span>
                    </td>
                    <td class="actions">
                        <x-ui.link
                            route="admin.faqs.edit"
                            class="btn edit-btn"
                            :id="$faq->id"
                        >
                            Edit
                        </x-ui.link>

                        <form
                            action="{{ route('admin.faq.change-status', $faq->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('Patch')

                            <x-ui.button class="status-btn">
                                Change Status
                            </x-ui.button>

                        </form>


                        <form
                            action="{{ route('admin.faqs.destroy', $faq->id) }}"
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
