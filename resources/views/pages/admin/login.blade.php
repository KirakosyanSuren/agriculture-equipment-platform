@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin/pages/login.css') }}">
@endpush

<x-admin.layout.auth>
    <section class="login-section">

        <div class="login-overlay"></div>

        <div class="login-card">

            <div class="login-top">

            <span>
                AgroMach
            </span>

                <p>
                    Admin Dashboard Login
                </p>

            </div>

            <form
                action="{{ route('admin.login') }}"
                method="POST"
                class="login-form"
            >

                @csrf

                <x-ui.input
                    label="Email"
                    name="email"
                    type="email"
                    placeholder="Enter your email"
                />


                <x-ui.input
                    label="Password"
                    name="password"
                    type="password"
                    placeholder="Enter your password"
                />

                <x-ui.button class="create-btn">
                    Sign In
                </x-ui.button>

            </form>

        </div>

    </section>
</x-admin.layout.auth>
