<x-admin.shared.form
    route="admin.faqs.index"
    title="Edit Faq"
>
    <form
        action="{{ route('admin.faqs.update', $faq->id) }}"
        method="POST"
        class="admin-form"
    >

        @csrf
        @method('PUT')

        {{-- QUESTION --}}
        <div class="form-grid">
            <x-ui.input
                label="Question"
                name="question"
                placeholder="Enter question"
                value="{{ $faq->question }}"
            />

            {{--   SORT ORDER  --}}

            <x-ui.input
                label="Sort Order"
                type="number"
                name="sort_order"
                placeholder="Enter question"
                value="{{ $faq->sort_order }}"
            />


        </div>

        {{-- ANSWER --}}
        <x-ui.textarea
            label="Answer"
            name="answer"
            placeholder="Enter Answer"
            value="{{ $faq->answer }}"
        />

        {{-- ACTIONS --}}

        <x-ui.button
            class="create-btn"
        >
            Update
        </x-ui.button>


    </form>
</x-admin.shared.form>
