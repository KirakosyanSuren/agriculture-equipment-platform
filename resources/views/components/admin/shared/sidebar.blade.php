<div class="sidebar-overlay"></div>

<aside class="sidebar">

    <div class="sidebar-logo">

        <span>
            AgroMach
        </span>

        <small>
            ADMIN PANEL
        </small>

        <button class="sidebar-close">
            ✕
        </button>

    </div>

    <nav class="sidebar-nav">

        <x-ui.link
            route="admin.dashboard"
            active="admin.dashboard*"
        >
            Dashboard
        </x-ui.link>

        <x-ui.link
            route="admin.inventories.index"
            active="admin.inventories*"
        >
            Inventory
        </x-ui.link>

        <x-ui.link
            route="admin.equipment-types.index"
            active="admin.equipment-types*"
        >
            Equipment Type
        </x-ui.link>

        <x-ui.link
            route="admin.brands.index"
            active="admin.brands*"
        >
            Brand
        </x-ui.link>

        <x-ui.link
            route="admin.faqs.index"
            active="admin.faqs*"
        >
            Faq
        </x-ui.link>

        <x-ui.link
            route="admin.careers.index"
            active="admin.careers*"
        >
            Careers
        </x-ui.link>

        <x-ui.link
            route="admin.members.index"
            active="admin.members*"
        >
            Our Team
        </x-ui.link>

        <x-ui.link
            route="admin.contacts.index"
            active="admin.contacts*"
        >
            Contact Us
        </x-ui.link>

        <x-ui.link
            route="admin.testimonials.index"
            active="admin.testimonials*"
        >
            Testimonials
        </x-ui.link>

    </nav>

</aside>
