@if(session('success'))

    <div class="global-alert global-alert-success">

        <span>
            {{ session('success') }}
        </span>

        <button class="global-alert-close">

            ✕

        </button>

    </div>

@endif
