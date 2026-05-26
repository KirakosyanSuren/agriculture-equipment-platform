<x-app title="Customer Testimonials">
    <section class="team-page">

        <!-- HERO -->

        <section class="team-hero">

            <div class="container">

                <div class="team-hero-content">

                    <div class="section-sub">
                        Real feedback from farmers
                    </div>

                    <h1 class="team-title">
                        Customer Testimonials
                    </h1>

                </div>

            </div>

        </section>

        <!-- TEAM -->

        <section class="team-section">

            <div class="container">

                <div class="testimonials-grid">

                    <!-- CARD -->

                    @foreach($testimonials as $testimonial)
                        <x-team.team-card
                            :image="$testimonial->image->path"
                            :name="$testimonial->name"
                            :description="$testimonial->description"
                        ></x-team.team-card>
                    @endforeach

                </div>

            </div>

        </section>

    </section>
</x-app>
