@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/contact.css') }}">
@endpush

<x-shared.info-page
    title="About Us"
    page_title="Built For Modern Agriculture"
    sub_title="About AgroMach"
    form_title="Send A Message"
    form_description="Our team is ready to help you choose the right agricultural equipment and answer any questions."
    page="contact_us"
    contact_types="true"
>

    @foreach($contacts as $contact)
        <x-contact.contact-card
            :title="$contact->title"
            :description="$contact->contact"
        />
    @endforeach


</x-shared.info-page>
