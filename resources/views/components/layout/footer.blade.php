<footer>

    <div class="container">

        <div class="footer-grid">

            <div>

                <div class="logo" style="margin-bottom:25px;">
                    AGRO<span>MACH</span>
                </div>

                <p class="footer-text">
                    Premium agricultural machinery and farming solutions for modern
                    agriculture. Nationwide delivery, maintenance and warranty support.
                </p>

            </div>

            <div>

                <h4 class="footer-title">
                    Navigation
                </h4>

                <div class="footer-links">
                    <a href="{{ route('inventory') }}">Inventory</a>
                    <a href="{{ route('maintenance') }}">Maintenance</a>
                    <a href="{{ route('warranty') }}">Warranty</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                </div>

            </div>

            <div>

                <h4 class="footer-title">
                    Company
                </h4>

                <div class="footer-links">
                    <a href="{{ route('faq') }}">FAQ</a>
                    <a href="{{ route('careers') }}">Careers</a>
                    <a href="{{ route('team') }}">Our Team</a>
                    <a href="{{ route('customer_testimonials') }}">Testimonials</a>
                </div>

            </div>

            <div>

                <h4 class="footer-title">
                    Contact
                </h4>

                <div class="footer-links">
                    <a href="mailto:info@agromach.com">info@agromach.com</a>
                    <a href="tel:+37400000000">+374 00 000 000</a>
                    <a href="{{ route('delivery') }}">Nationwide Delivery</a>
                    <span>24/7 Support</span>
                </div>

            </div>

        </div>

        <div class="footer-bottom">

            <div>
                © {{ date('Y') }} AgroMach. All Rights Reserved.
            </div>

            <div>
                Premium Agricultural Equipment Marketplace
            </div>

        </div>

    </div>

</footer>
