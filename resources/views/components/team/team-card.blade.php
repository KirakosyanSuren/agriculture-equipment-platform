@props([
    'image',
    'alt' => '',
    'name',
    'role' => '',
    'description'
])

<div class="team-card">

    <div class="team-image">

        <img
            src="{{ asset('storage/' . $image) }}"
            alt="{{ $alt }}"
            loading="lazy"
        >

    </div>

    <div class="team-content">

        <h3>
            {{ $name }}
        </h3>

        @if($role)

            <div class="team-role">
                {{ $role }}
            </div>

        @endif

        <p>
            {{ $description }}
        </p>

    </div>

</div>
