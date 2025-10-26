<x-layouts.auth>
    <x-auth-header
        :title="__('Reset Password')"
        :description="__('Please enter your email address and new password to reset your password.')"
    />

    <x-auth-session-status class="text-center" :status="session('status')" />

    <flux:card>
        <div class="flex flex-col gap-6">
            <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-6">
                @csrf

                <flux:input
                    name="email"
                    :label="__('Email address')"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                    :value="old('email', $request->email)"
                    disabled
                />

                <flux:input
                    name="password"
                    :label="__('New password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('New password')"
                    viewable
                />

                <flux:input
                    name="password_confirmation"
                    :label="__('Confirm new password')"
                    type="password"
                    required
                    autocomplete="new-password"
                    :placeholder="__('Confirm new password')"
                    viewable
                />

                <input type="hidden" name="token" value="{{ $request->route('token') }}" />

                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">
                        {{ __('Reset Password') }}
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
