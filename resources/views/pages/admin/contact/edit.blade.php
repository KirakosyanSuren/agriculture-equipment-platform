<x-admin.shared.form
    route="admin.contacts.index"
    title="Update Contact"
>
    <form
        action="{{ route('admin.contacts.update', $contact->id) }}"
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
                :value="$contact->title"
            />

            {{-- CONTACT --}}

            <x-ui.input
                label="Contact"
                name="contact"
                placeholder="Enter Contact"
                :value="$contact->contact"
            />
        </div>

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Update
        </x-ui.button>


    </form>
</x-admin.shared.form>
