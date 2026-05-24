<x-admin.shared.form
    route="admin.careers.index"
    title="Create Position"
>
    <form
        action="{{ route('admin.careers.store') }}"
        method="POST"
        class="admin-form"
    >

        @csrf

        <div class="form-grid">
            {{-- TITLE --}}
            <x-ui.input
                label="Title"
                name="title"
                placeholder="Enter Title"
            />

            {{-- POSITION --}}
            <x-ui.input
                label="Position"
                name="position"
                placeholder="Enter position"
            />
        </div>

        <div class="form-grid">
            {{-- WORK TYPE --}}
            <x-ui.select
                label="Work Type"
                name="work_type"
                default_option="All Types"
                :options="[
                    [
                        'value' => 'on_site',
                        'label' => 'On Site'
                    ],
                    [
                        'value' => 'hybrid',
                        'label' => 'Hybrid'
                    ],
                    [
                        'value' => 'remote',
                        'label' => 'Remote'
                    ]
                ]"
            />

            {{-- EMPLOYMENT TYPE --}}
            <x-ui.select
                label="Employment Type"
                name="employment_type"
                default_option="All Types"
                :options="[
                    [
                        'value' => 'full_time',
                        'label' => 'Full Time'
                    ],
                    [
                        'value' => 'part_time',
                        'label' => 'Part Time'
                    ],

                ]"
            />
        </div>

        {{-- DESCRIPTION --}}
        <x-ui.textarea
            label="Description"
            name="description"
            placeholder="Enter description"
        />

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Create
        </x-ui.button>


    </form>
</x-admin.shared.form>
