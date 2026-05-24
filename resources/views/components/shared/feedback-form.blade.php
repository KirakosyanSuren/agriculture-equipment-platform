@props([
    'title',
    'description',
    'equipment_types' => [],
    'contact_types' => [],
    'positions' => [],
    'cv_field' => '',
    'page',
    'equipment_type_available' => '',
    'position_available' => ''
])

<div class="feedback-form-wrapper">

    <div class="form-card">

        <h2>
            {{ $title }}
        </h2>

        <p>
            {{ $description }}
        </p>

        <form action="{{ route('feedback.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="page_name" value="{{ $page }}">

            <div class="form-row">

                <x-ui.input
                    label="Full Name *"
                    name="full_name"
                    placeholder="Enter your name"
                />

                <x-ui.input
                    label="Phone *"
                    name="phone"
                    placeholder="+374 00 000 000"
                />
            </div>


            <div class="form-row">

                <x-ui.input
                    label="Email *"
                    name="email"
                    type="email"
                    placeholder="example@email.com"
                />
                @if($equipment_type_available)
                    <x-ui.select
                        label="Equipment Type"
                        name="equipment_type_id"
                        default_option="All Types"
                        :options="$equipment_types->map(fn($equipment_type) => [
                            'value' => $equipment_type->id,
                            'label' => $equipment_type->name
                        ])"
                    />
                @endif

                @if($contact_types)
                    <x-ui.select
                        label="Contact Type"
                        name="contact_type"
                        default_option="Select Contact Type"
                        :options="[
                            [
                                'value' => 'phone',
                                'label' => 'Phone'
                            ],
                            [
                                'value' => 'email',
                                'label' => 'Email'
                            ]
                        ]"
                    />
                @endif

                @if($position_available)
                    <x-ui.select
                        label="Position"
                        name="career_id"
                        default_option="Select Position"
                        :options="$positions->map(fn($position) => [
                            'value' => $position->id,
                            'label' => $position->position
                        ])"
                    />
                @endif
            </div>

            <div class="form-row">

                <x-ui.input
                    label="Preferred Date"
                    name="preferred_date"
                    type="date"
                />

                <x-ui.input
                    label="Preferred Time"
                    name="preferred_time"
                    type="time"
                />

            </div>


            <x-ui.textarea
                label="Message"
                name="message"
                placeholder="Your message..."
            />

            @if($cv_field)
                <x-ui.file-input
                    label="CV"
                    name="file"
                />
            @endif

            <!-- BUTTON -->

            <x-ui.button class="btn-primary submit-btn">
                Submit
            </x-ui.button>

        </form>

    </div>

</div>
