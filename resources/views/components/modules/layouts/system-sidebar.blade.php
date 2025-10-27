<flux:sidebar sticky collapsible class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.header>
        <flux:sidebar.brand
            href="#"
            logo="https://fluxui.dev/img/demo/logo.png"
            logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
            name="{{ config('app.name', 'Notion Mini') }}"
        />
        <flux:sidebar.collapse
            class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2"
        />
    </flux:sidebar.header>
    <flux:sidebar.nav>
        <flux:sidebar.item icon="home" href="{{ route('dashboard') }}" :current="request()->routeIs('dashboard')">Home</flux:sidebar.item>
        <flux:sidebar.item icon="building-office" href="{{ route('system.tenants.index') }}" :current="request()->routeIs('system.tenants.*')">Tenants</flux:sidebar.item>
        <flux:sidebar.item icon="user-group" href="#">Users</flux:sidebar.item>
        <flux:sidebar.group expandable heading="ABAC" class="grid" icon="shield-check">
            <flux:sidebar.item href="#">Policies</flux:sidebar.item>
            <flux:sidebar.item href="#">Attributes</flux:sidebar.item>
            <flux:sidebar.item href="#">Monitoring</flux:sidebar.item>
        </flux:sidebar.group>
    </flux:sidebar.nav>
    <flux:sidebar.spacer />
    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:sidebar.profile name="{{ Auth::user()->name }}" />
        <flux:menu>
            <flux:menu.item icon="cog-6-tooth">Account</flux:menu.item>
            <flux:menu.separator />
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <flux:menu.item icon="arrow-right-start-on-rectangle" type="submit">Logout</flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
