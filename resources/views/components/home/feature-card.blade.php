@props([
    'route',
    'img',
    'alt' => '',
    'title',
    'description'
])


<a href="{{ route($route) }}" class="feature-card">
    <img src="{{ $img }}" alt="{{ $alt }}">

    <div class="feature-content">
        <h3>{{ $title }}</h3>
        <p>
            {{ $description }}
        </p>
    </div>
</a>
