@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">

    <h1 class="text-lg font-bold mb-8 pb-2 border-b">{{ $heading }}</h1>


    <!-- Search -->
    <div class="flex justify-between">
        <form method="GET" action="#">
            <input type="text"
                   name="search"
                   placeholder="Find something"
                   value="{{ request('search') }}"
            >
        </form>
        <a href="export_orders">Export All Orders</a>
    </div>


    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/" class="{{ request()->is('/') ? 'text-blue-500' : '' }}">All Orders</a>
                </li>
                <li>
                    <a href="/create_order" class="{{ request()->is('create_order') ? 'text-blue-500' : '' }}">New order</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">

                {{ $slot }}

        </main>
    </div>
</section>
