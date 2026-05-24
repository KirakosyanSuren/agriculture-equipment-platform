<x-admin.shared.form
    route="admin.careers.index"
    title="Update Position"
>
    <form
        action="{{ route('admin.careers.update', $career->id) }}"
        method="POST"
        class="admin-form"
    >

        @csrf
        @method('PUT')

        <div class="form-grid">
            {{-- TITLE --}}
            <x-ui.input
                label="Title"
                name="title"
                placeholder="Enter Title"
                :value="$career->title"
            />

            {{-- POSITION --}}
            <x-ui.input
                label="Position"
                name="position"
                placeholder="Enter position"
                :value="$career->position"
            />
        </div>

        <div class="form-grid">
            {{-- WORK TYPE --}}
            <x-ui.select
                label="Work Type"
                name="work_type"
                default_option="All Types"
                :value="$career->work_type"
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
                :value="$career->employment_type"
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
            :value="$career->description"
        />

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Update
        </x-ui.button>


    </form>
</x-admin.shared.form>
