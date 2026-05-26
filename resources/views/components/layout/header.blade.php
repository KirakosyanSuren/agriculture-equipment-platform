<header>

    <nav class="container nav">

        <div class="logo">
            <a href="{{ route('home') }}">
                AGRO<span>MACH</span>
            </a>
        </div>

        <ul class="nav-links" id="navLinks">

            <li>
                <x-ui.link
                    route="inventory"
                    active="inventory*"
                >
                    Inventory
                </x-ui.link>

            </li>
            <li>

                <x-ui.link
                    route="maintenance"
                    active="maintenance*"
                >
                    Maintenance
                </x-ui.link>

            </li>
            <li>

                <x-ui.link
                    route="delivery"
                    active="delivery*"
                >
                    Nationwide Delivery
                </x-ui.link>

            </li>
            <li>

                <x-ui.link
                    route="guarantee"
                    active="guarantee*"
                >
                    Money Back Guarantee
                </x-ui.link>

            </li>
            <li>
                <x-ui.link
                    route="warranty"
                    active="warranty*"
                >
                    Warranty
                </x-ui.link>
            </li>

            <li class="nav-dropdown">

{{--                <a--}}
{{--                    href="{{ route('about') }}"--}}
{{--                    class="dropdown-toggle {{ request()->routeIs('about') ? 'active' : '' }}"--}}
{{--                >--}}

                <x-ui.link
                    route="contact"
                    class="dropdown-toggle about_link"
                >
                    About Us

                    <span class="dropdown-icon">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </span>
                </x-ui.link>


{{--                </a>--}}

                <div class="dropdown">

                    <x-ui.link
                        route="faq"
                        active="faq*"
                    >
                        FAQ
                    </x-ui.link>

                    <x-ui.link
                        route="careers"
                        active="careers*"
                    >
                        Careers
                    </x-ui.link>

                    <x-ui.link
                        route="team"
                        active="team*"
                    >
                        Our Team
                    </x-ui.link>

                    <x-ui.link
                        route="contact"
                        active="contact*"
                    >
                        Contact Us
                    </x-ui.link>

                    <x-ui.link
                        route="customer_testimonials"
                        active="customer_testimonials*"
                    >
                        Customer Testimonials
                    </x-ui.link>


                </div>

            </li>

        </ul>

        <div class="burger" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </nav>

</header>
