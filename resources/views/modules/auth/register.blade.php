<x-layouts.auth>
    <x-modules.auth.header
        :title="__('Create your account')"
        :description="__('Enter your information below to create your account')"
    />

    <x-modules.auth.session-status class="text-center" :status="session('status')" />

    <flux:card>
        <div class="flex flex-col gap-6">
            <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
                @csrf

                <flux:input
                    name="name"
                    :label="__('Full name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="John Doe"
                />

                <flux:input
                    name="email"
                    :label="__('Email address')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                <flux:input
                    name="password"
                    :label="__('Password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Password')"
                    viewable
                />

                <flux:input
                    name="password_confirmation"
                    :label="__('Confirm password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Confirm password')"
                    viewable
                />

                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full" data-test="register-button">
                        {{ __('Create account') }}
                    </flux:button>
                </div>
            </form>

            @if (Route::has('login'))
                <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                    <span>{{ __('Already have an account?') }}</span>
                    <flux:link :href="route('login')" wire:navigate>{{ __('Sign in') }}</flux:link>
                </div>
            @endif
        </div>
    </flux:card>
</x-layouts.auth>
