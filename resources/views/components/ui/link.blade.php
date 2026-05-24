@props([
    'route',
    'active' => null,
    'id' => '',
])

<a
    href="{{ $id ? route($route, $id) : route($route) }}"

    {{
        $attributes->class([
            'active' => $active ? request()->routeIs($active) : false
        ])
    }}
>
    {{ $slot }}
</a>
