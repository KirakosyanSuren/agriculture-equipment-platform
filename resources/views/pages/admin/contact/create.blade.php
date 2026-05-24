<x-admin.shared.form
    route="admin.contacts.index"
    title="Create Contact"
>
    <form
        action="{{ route('admin.contacts.store') }}"
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

            {{-- CONTACT --}}

            <x-ui.input
                label="Contact"
                name="contact"
                placeholder="Enter Contact"
            />
        </div>

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Create
        </x-ui.button>


    </form>
</x-admin.shared.form>
