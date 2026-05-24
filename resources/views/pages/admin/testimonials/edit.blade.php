<x-admin.shared.form
    route="admin.testimonials.index"
    title="Update Testimonial"
>

    <form
        action="{{ route('admin.testimonials.update', $testimonial->id) }}"
        method="POST"
        class="admin-form"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        {{-- NAME --}}
        <x-ui.input
            label="Name"
            name="name"
            placeholder="Enter Name"
            :value="$testimonial->name"
        />

        {{-- DESCRIPTION --}}
        <x-ui.textarea
            label="Description"
            name="description"
            placeholder="Enter Description"
            :value="$testimonial->description"
        />

        <x-admin.ui.edit-image
            name="image"
            label="Member Photo"
            :images="$testimonial->images"
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
