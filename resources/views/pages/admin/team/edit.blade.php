<x-admin.shared.form
    route="admin.members.index"
    title="Edit Member"
>
    <form
        action="{{ route('admin.members.update', $member->id) }}"
        method="POST"
        class="admin-form"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="form-grid">
            {{-- NAME --}}
            <x-ui.input
                label="Name"
                name="name"
                placeholder="Enter Name"
                :value="$member->name"
            />

            {{-- POSITION --}}

            <x-ui.input
                label="Position"
                name="position"
                placeholder="Enter Position"
                :value="$member->position"
            />
        </div>

        {{-- DESCRIPTION --}}
        <x-ui.textarea
            label="Description"
            name="description"
            placeholder="Enter Description"
            :value="$member->description"
        />

        <x-admin.ui.edit-image
            name="image"
            label="Member Photo"
            :images="$member->images"
        />

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Update
        </x-ui.button>

    </form>

    <x-ui.error-alert />
</x-admin.shared.form>
