<div class="features">
    <div class="container">

        <div class="feature-grid">

           <x-home.feature-card
                route="inventory"
                :img="asset('assets/images/inventory.png')"
                title="Inventory"
                description="Explore high-performance tractors, harvesters and farming machines."
           />

            <x-home.feature-card
                route="delivery"
                :img="asset('assets/images/delevery.png')"
                title="Delivery"
                description="Nationwide transportation with secure logistics and fast delivery."
            />

            <x-home.feature-card
                route="warranty"
                :img="asset('assets/images/warranty.png')"
                title="Warranty"
                description="Extended protection plans and certified agricultural equipment."
            />

            <x-home.feature-card
                route="maintenance"
                :img="asset('assets/images/maintenance.png')"
                title="Maintenance"
                description="Professional service and maintenance support for all machinery."
            />

        </div>

    </div>
</div>
