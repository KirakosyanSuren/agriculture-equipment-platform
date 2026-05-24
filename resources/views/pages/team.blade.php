<x-app title="Our Team">

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/pages/team.css') }}">
    @endpush

    <section class="team-page">

        <!-- HERO -->

        <section class="team-hero">

            <div class="container">

                <div class="team-hero-content">

                    <div class="section-sub">
                        AgroMach
                    </div>

                    <h1 class="team-title">
                        Our Team
                    </h1>

                </div>

            </div>

        </section>

        <!-- TEAM -->

        <section class="team-section">

            <div class="container">

                <div class="team-grid">

                    <!-- CARD -->

                    @foreach($members as $member)

                        <x-team.team-card
                            :image="$member->image->path"
                            :name="$member->name"
                            :role="$member->position"
                            :description="$member->description"
                        ></x-team.team-card>
                    @endforeach

                </div>

            </div>

        </section>

    </section>

</x-app>
