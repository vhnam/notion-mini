<x-layouts.auth>
    <x-modules.auth.header
        :title="__('Forgot your password?')"
        :description="__('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')"
    />

    <x-modules.auth.session-status class="text-center" :status="session('status')" />

    <flux:card>
        <div class="flex flex-col gap-6">
            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-6">
                @csrf

                <flux:input
                    name="email"
                    :label="__('Email address')"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full" data-test="forgot-password-button">
                        {{ __('Email Password Reset Link') }}
                    </flux:button>
                </div>
            </form>

            @if (Route::has('login'))
                <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                    <span>{{ __('Remember your password?') }}</span>
                    <flux:link :href="route('login')" wire:navigate>{{ __('Sign in') }}</flux:link>
                </div>
            @endif
        </div>
    </flux:card>
</x-layouts.auth>
