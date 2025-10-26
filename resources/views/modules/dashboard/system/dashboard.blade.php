<x-layouts.dashboard>
    <flux:heading size="xl" level="1">Good afternoon, {{ Auth::user()->name }}</flux:heading>
    <flux:text class="mb-6 mt-2 text-base">Here's what's new today</flux:text>
    <flux:separator variant="subtle" />

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- User Info Card -->
        <flux:card>
            <div class="p-6">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-4">Account Information</h3>
                <div class="space-y-2">
                    <div>
                        <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Name:</span>
                        <span class="ml-2 text-zinc-900 dark:text-zinc-100">{{ Auth::user()->name }}</span>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Email:</span>
                        <span class="ml-2 text-zinc-900 dark:text-zinc-100">
                            {{ Auth::user()->email }}
                        </span>
                    </div>
                    <div>
                        <span class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Member since:</span>
                        <span class="ml-2 text-zinc-900 dark:text-zinc-100">
                            {{ Auth::user()->created_at->format('M j, Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </flux:card>

        <!-- Status Card -->
        <flux:card>
            <div class="p-6">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-100 mb-4">Account Status</h3>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        <span class="text-sm text-zinc-900 dark:text-zinc-100">Account Active</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                        <span class="text-sm text-zinc-900 dark:text-zinc-100">Logged In</span>
                    </div>
                    @if (Auth::user()->email_verified_at)
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-sm text-zinc-900 dark:text-zinc-100">Email Verified</span>
                        </div>
                    @else
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                            <span class="text-sm text-zinc-900 dark:text-zinc-100">Email Not Verified</span>
                        </div>
                    @endif
                </div>
            </div>
        </flux:card>
    </div>
</x-layouts.dashboard>
