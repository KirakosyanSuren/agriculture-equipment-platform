<x-shared.info-page
    title="Careers"
    page_title="Build Your Career With AgroMach"
    sub_title="Join Our Team"
    form_title="Apply Today"
    form_description="Send us your information and our recruitment team will contact you."
    page="careers"
    :positions="$positions"
    cv_field="true"
    position_available="true"
>

    <div class="info-block">

        <h2>
            Work With Industry Professionals
        </h2>

        <p>
            AgroMach is growing rapidly and we are looking for motivated
            professionals who are passionate about agriculture, machinery
            and customer service.
        </p>

        <p>
            We provide a modern work environment, career growth opportunities
            and the chance to work with advanced agricultural equipment
            across the country.
        </p>

    </div>

    <!-- BENEFITS -->

    <div class="career-benefits">

        <div class="benefit-card">

            <div class="benefit-icon">
                🚜
            </div>

            <h3>
                Modern Equipment
            </h3>

            <p>
                Work with advanced agricultural machinery and technology.
            </p>

        </div>

        <div class="benefit-card">

            <div class="benefit-icon">
                📈
            </div>

            <h3>
                Career Growth
            </h3>

            <p>
                Build long-term professional development opportunities.
            </p>

        </div>

        <div class="benefit-card">

            <div class="benefit-icon">
                💼
            </div>

            <h3>
                Competitive Pay
            </h3>

            <p>
                Receive competitive compensation and performance bonuses.
            </p>

        </div>

        <div class="benefit-card">

            <div class="benefit-icon">
                🌎
            </div>

            <h3>
                Nationwide Projects
            </h3>

            <p>
                Be part of large-scale agricultural operations nationwide.
            </p>

        </div>

    </div>

    <!-- OPEN POSITIONS -->

    <div class="info-block">

        <h2>
            Open Positions
        </h2>

    </div>

    <div class="jobs-wrapper">

        @foreach($positions as $position)
            <div class="job-card">
                <div class="job-top">

                    <div>

                        <h3>
                            {{ $position->title }}
                        </h3>

                        <div class="job-meta">
                            {{ $position->employment_type_label }} • {{ $position->work_type_label }}
                        </div>

                    </div>

                    <div class="job-tag">
                        {{ $position->position }}
                    </div>

                </div>

                <p>
                    {{ $position->description }}
                </p>

            </div>
        @endforeach

    </div>

    <x-ui.error-alert />

</x-shared.info-page>
