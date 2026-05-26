<x-app title="Home">
    <x-shared.hero
        sub_title="Modern Agricultural Equipment"
        title="Powerful Machines For Modern Farming"
        description="Premium tractors, harvesters, seeders and agricultural equipment engineered for productivity, durability and nationwide performance."
    >
        <div class="hero-buttons">

            <x-ui.link
                route="inventory"
                class="btn btn-primary"
            >
                Browse Inventory
            </x-ui.link>

            <x-ui.link
                route="warranty"
                class="btn btn-secondary"
            >
                Learn More
            </x-ui.link>

        </div>
    </x-shared.hero>


    <!-- FEATURES -->

    <x-home.features/>

    <!-- FEATURED INVENTORY -->

    <x-home.featured-inventory :items="$inventories"/>

    <!-- CTA -->

    <x-home.cta/>


</x-app>
