<x-shared.info-page
    title="FAQ"
    page_title="Frequently Asked Questions"
    sub_title="AgroMach Support"
    form_title="Need More Help?"
    form_description="Contact our team if you cannot find the answer you are looking for."
    page="faq"
    contact_types="true"
>

    <div class="faq-wrapper">

        @foreach($faqs as $faq)

            <!-- ITEM -->

            <div class="faq-item">

                <button class="faq-question">

                <span>
                    {{ $faq->question }}
                </span>

                    <div class="faq-icon">
                        +
                    </div>

                </button>

                <div class="faq-answer">
                    {{ $faq->answer }}
                </div>

            </div>
      @endforeach
    </div>


</x-shared.info-page>
