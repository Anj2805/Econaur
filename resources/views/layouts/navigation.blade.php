<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>
    @if(Auth::check() && !Auth::user()->is_admin)
        <x-nav-link :href="route('admin.login')" :active="request()->routeIs('admin.login')">
            {{ __('Admin Login') }}
        </x-nav-link>
    @endif
</div> 