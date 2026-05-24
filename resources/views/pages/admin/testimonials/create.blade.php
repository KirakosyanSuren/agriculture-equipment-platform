<x-admin.shared.form
    route="admin.testimonials.index"
    title="Create Testimonial"
>
    <form
        action="{{ route('admin.testimonials.store') }}"
        method="POST"
        class="admin-form"
        enctype="multipart/form-data"
    >

        @csrf

        {{-- NAME --}}
        <x-ui.input
            label="Name"
            name="name"
            placeholder="Enter Name"
        />

        {{-- DESCRIPTION --}}
        <x-ui.textarea
            label="Description"
            name="description"
            placeholder="Enter Description"
        />

        <x-admin.ui.create-image
            name="image"
            label="Testimonial Image"
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
