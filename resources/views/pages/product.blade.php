<x-app title="John Deere 8R 410">

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/pages/product.css') }}">
    @endpush

    <section class="single-inventory-page">

        <div class="container">

            <div class="single-inventory-grid">

                <!-- LEFT -->

                <div class="single-inventory-main">
                    <h1>{{ $inventory->title }}</h1>

                    <!-- GALLERY -->

                    <x-product.gallery
                        :data="$inventory"
                    />

                    <!-- SPECIFICATIONS -->

                    <x-product.speces
                        :specs="
                            [
                                'Serial number' => $inventory->serial_number,
                                'Brand' => $inventory->brand->name,
                                'Equipment type' => $inventory->equipment_type->name,
                                'Model' => $inventory->model,
                                'Condition' => $inventory->condition,
                                'Year' => $inventory->year,
                                'Hour' => $inventory->hour,
                                'Horsepower' => $inventory->horsepower . 'HP',
                                'Engine' => $inventory->engine,
                                'Transmission' => $inventory->transmission,
                                'Fuel type' => $inventory->fuel_type,
                                'Location' => $inventory->location
                            ]
                        "
                    />

                    <!-- DESCRIPTION -->

                    <div class="inventory-description">

                        <h2>
                            Description
                        </h2>

                        <p>{{ $inventory->description }}</p>

                    </div>

                </div>

                <!-- SIDEBAR -->

                <div class="inventory-sidebar">

                    <!-- PRICE -->

                    <div class="inventory-price-card">

                        <div class="inventory-price-label">
                            Price
                        </div>

                        <div class="inventory-price">
                            $ {{ number_format($inventory->price) }}
                        </div>

                    </div>

                    <!-- FORM -->

                    <div class="inventory-form-card">
                        <x-shared.feedback-form
                            title="Request More Information"
                            description="Contact our agricultural equipment specialists today."
                            contact_types="true"
                            page="product"
                        />
                    </div>

                    <!-- FEATURED -->

                    <x-product.feauted
                        :data="$featured_inventory"
                    />

                    <!-- WARRANTY -->

                    <div class="inventory-banner">

                        <div class="inventory-banner-content">

                            <h3>
                                Questions About Warranty?
                            </h3>

                            <a href="{{ route('warranty') }}" class="btn btn-primary">
                                View Warranty
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @push('scripts')
        <script src="{{ asset('assets/js/gallery.js') }}"></script>
    @endpush

</x-app>
