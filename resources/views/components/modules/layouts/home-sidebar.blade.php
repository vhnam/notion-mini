<flux:sidebar sticky collapsible class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.header>
        <flux:sidebar.brand
            href="#"
            logo="https://fluxui.dev/img/demo/logo.png"
            logo:dark="https://fluxui.dev/img/demo/dark-mode-logo.png"
            name="{{ tenant('id') ?? Auth::user()->getTenantId() }}"
        />
        <flux:sidebar.collapse
            class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2"
        />
    </flux:sidebar.header>

    <flux:sidebar.nav>
        <flux:sidebar.item icon="home" href="#" current>Home</flux:sidebar.item>
        <flux:sidebar.item icon="magnifying-glass">Search</flux:sidebar.item>
        <flux:sidebar.group expandable heading="Published" class="grid" icon="globe-alt">
            <flux:sidebar.item icon="plus">Add a page</flux:sidebar.item>
        </flux:sidebar.group>
        <flux:sidebar.group expandable heading="Drafts" class="grid" icon="document-text">
            <flux:sidebar.item icon="plus">Add a page</flux:sidebar.item>
        </flux:sidebar.group>
    </flux:sidebar.nav>
    <flux:sidebar.spacer />
    <flux:sidebar.nav>
        <flux:sidebar.item icon="building-office" href="{{ route('my-tenant.show') }}" :current="request()->routeIs('my-tenant.*')">My Tenant</flux:sidebar.item>
        <flux:sidebar.item icon="cog-6-tooth" href="#">Settings</flux:sidebar.item>
        <flux:sidebar.item icon="information-circle" href="#">Help</flux:sidebar.item>
    </flux:sidebar.nav>
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
