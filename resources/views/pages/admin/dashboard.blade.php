<x-admin.layout.admin title="Dashboard">

    <x-admin.ui.table
        title="Feedback Requests"
        :model="$feedbacks"
        filter="true"
    >

        <x-slot:thead>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Preferred Date</th>
                    <th>Preferred Time</th>
                    <th>Contact Type</th>
                    <th>Equipment Type</th>
                    <th>Position</th>
                    <th>Page</th>
                    <th>Message</th>
                    <th>Document</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </x-slot:thead>

        <x-slot:search>
            <form id="filter-form" class="admin-table-search-form" action="{{ route('admin.dashboard') }}">
                <div class="admin-table-search">

                    <x-ui.input
                        label="Full Name"
                        name="full_name"
                        placeholder="Enter Full Name"
                        :value="request('full_name')"
                    />

                    <x-ui.input
                        label="Email"
                        name="email"
                        placeholder="Enter Email"
                        :value="request('email')"
                    />

                    <x-ui.input
                        label="Phone"
                        name="phone"
                        placeholder="Enter Phone"
                        :value="request('phone')"
                    />

                    <x-ui.input
                        type="date"
                        label="Date From"
                        name="date_from"
                        :value="request('date_from')"
                    />

                    <x-ui.input
                        type="date"
                        label="Date To"
                        name="date_to"
                        :value="request('date_to')"
                    />

                    <x-ui.select
                        label="Page"
                        name="page_name"
                        default_option="All Pages"
                        :value="request('page_name')"
                        :options="$page_names->map(
                            fn($label, $value) => [
                                'value' => $value,
                                'label' => $label
                            ])->values()"
                    />

                    <x-ui.select
                        label="Status"
                        name="status"
                        default_option="All Status"
                        :value="request('status')"
                        :options="[
                            [
                                'value' => 0,
                                'label' => 'Pending'
                            ],
                            [
                                'value' => 1,
                                'label' => 'Completed'
                            ]
                        ]"
                    />

                </div>
                <x-ui.button class="create-btn">
                    Apply Filters
                </x-ui.button>
            </form>
        </x-slot:search>

        <x-slot:tbody>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedbacks->firstItem() + $loop->index }}</td>
                        <td>{{ $feedback->full_name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->phone }}</td>
                        <td>{{ date('m-d-Y', strtotime($feedback->preferred_date)) }}</td>
                        <td>{{ date('H:i', strtotime($feedback->preferred_time)) }}</td>
                        <td>{{ $feedback->contact_type_label }}</td>
                        <td>{{ $feedback->equipment_type_name }}</td>
                        <td>{{ $feedback->career_name }}</td>
                        <td>{{ $feedback->page_name_label }}</td>
                        <td class="message">{{ $feedback->message }}</td>
                        <td>
                            @if($feedback->file)

                                <a href="{{ asset('storage/' . $feedback->file->path) }}">
                                    CV
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <span class="status-badge {{ $feedback->status ? 'success' : 'pending' }}">
                                {{ $feedback->status ? 'Completed' : 'Pending' }}
                            </span>
                        </td>
                        <td class="actions">

                            @if(!$feedback->status)

                                <form
                                    action="{{ route('admin.feedback.change-status', $feedback->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('Patch')

                                    <x-ui.button class="status-btn">
                                        Completed
                                    </x-ui.button>

                                </form>

                            @else

                                <form
                                    action="{{ route('admin.feedback.destroy', $feedback->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <x-ui.button class="delete-btn">
                                        Delete
                                    </x-ui.button>

                                </form>

                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-slot:tbody>

    </x-admin.ui.table>

</x-admin.layout.admin>
