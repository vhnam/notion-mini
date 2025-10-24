<form method="POST" action="{{ route('logout') }}" class="inline">
    @csrf
    <flux:button variant="ghost" type="submit" size="sm">
        {{ __('Log out') }}
    </flux:button>
</form>
