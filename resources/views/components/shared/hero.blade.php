@props([
    'sub_title',
    'title',
    'description',
])

<section class="hero">

    <div class="container">

        <div class="hero-content">

            <div class="hero-sub">
                {{ $subTitle }}
            </div>

            <h1>
                {{ $title }}
            </h1>

            <p>
                {{ $description }}
            </p>

            {{ $slot }}

        </div>

    </div>

</section>
