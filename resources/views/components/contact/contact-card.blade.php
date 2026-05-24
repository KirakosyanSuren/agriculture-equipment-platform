@props([
    'title',
    'description'
])

<div class="info-card">

    <div>

        <h3>
            {{ $title }}
        </h3>

        <p>
            {{ $description }}
        </p>

    </div>

</div>
