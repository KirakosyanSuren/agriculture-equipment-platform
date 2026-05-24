@props([
     'title' => 'Admin Dashboard'
])

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $title }}
    </title>

    <link rel="stylesheet" href="{{ asset('assets/css/admin/admin.css') }}">

    @stack('styles')

</head>
<body>

<div class="admin-layout">

    {{-- SIDEBAR --}}

    <x-admin.shared.sidebar />

    {{-- CONTENT --}}
    <main class="admin-content">

        <header class="admin-header">

            <div class="admin-header-left">

                <button class="sidebar-toggle">

                    ☰

                </button>

                <h1>
                    {{ $title }}
                </h1>

            </div>


            <form
                action="{{ route('admin.logout') }}"
                method="POST"
            >

                @csrf

                <x-ui.button class="logout-btn">
                    Logout
                </x-ui.button>

            </form>

        </header>

        <div class="admin-page">

            {{ $slot }}

        </div>

    </main>

    <x-ui.alert />

</div>

<script src="{{ asset('assets/js/admin/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/admin/modal.js') }}"></script>
<script src="{{ asset('assets/js/admin/file.js') }}"></script>
<script src="{{ asset('assets/js/alert.js') }}"></script>
<script src="{{ asset('assets/js/filter-form.js') }}"></script>

</body>
</html>
