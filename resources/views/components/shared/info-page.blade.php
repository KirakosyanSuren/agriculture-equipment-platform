@props([
    'title',
    'page_title',
    'sub_title',
    'form_title',
    'page',
    'form_description',
    'date_fields' => '',
    'cv_field' => '',
    'contact_types' => '',
    'equipment_types' => [],
    'positions' => [],
    'equipment_type_available' => '',
    'position_available' => ''
])

<x-app :title="$title">
    <section class="info-page">

        <div class="container">

            <div class="info-grid">

                <!-- LEFT -->

                <div class="info-left">

                    <div class="section-sub">
                        {{ $sub_title }}
                    </div>

                    <h1 class="info-title">
                        {{ $page_title }}
                    </h1>

                    <div class="info-content">
                        {{ $slot }}
                    </div>

                </div>

                {{-- RIGHT --}}

                <x-shared.feedback-form
                    :title="$form_title"
                    :description="$form_description"
                    :equipment_types="$equipment_types"
                    :contact_types="$contact_types"
                    :positions="$positions"
                    :cv_field="$cv_field"
                    :page="$page"
                    :equipment_type_available="$equipment_type_available"
                    :position_available="$position_available"
                />
            </div>
        </div>
    </section>
</x-app>
