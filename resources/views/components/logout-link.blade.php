<a
    href="#"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
    class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100"
>
    {{ __('Log out') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
