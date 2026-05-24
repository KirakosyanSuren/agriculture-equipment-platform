<x-admin.shared.form
    route="admin.faqs.index"
    title="Create Faq"
>
    <form
        action="{{ route('admin.faqs.store') }}"
        method="POST"
        class="admin-form"
    >

        @csrf

        <div class="form-grid">
            {{-- QUESTION --}}
            <x-ui.input
                label="Question"
                name="question"
                placeholder="Enter question"
            />

            {{--   SORT ORDER  --}}

            <x-ui.input
                label="Sort Order"
                type="number"
                name="sort_order"
                placeholder="Enter sort order"
            />
        </div>

        {{-- ANSWER --}}
        <x-ui.textarea
            label="Answer"
            name="answer"
            placeholder="Enter Answer"
        />

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Create
        </x-ui.button>


    </form>
</x-admin.shared.form>
