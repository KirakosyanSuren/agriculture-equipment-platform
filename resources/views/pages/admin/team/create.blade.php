<x-admin.shared.form
    route="admin.members.index"
    title="Create Member"
>
    <form
        action="{{ route('admin.members.store') }}"
        method="POST"
        class="admin-form"
        enctype="multipart/form-data"
    >

        @csrf

        <div class="form-grid">
            {{-- NAME --}}
            <x-ui.input
                label="Name"
                name="name"
                placeholder="Enter Name"
            />

            {{-- POSITION --}}

            <x-ui.input
                label="Position"
                name="position"
                placeholder="Enter Position"
            />
        </div>

        {{-- DESCRIPTION --}}
        <x-ui.textarea
            label="Description"
            name="description"
            placeholder="Enter Description"
        />

        <x-admin.ui.create-image
            name="image"
            label="Member Photo"
        />

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Create
        </x-ui.button>

    </form>

    <x-ui.error-alert />
</x-admin.shared.form>
