<x-layouts.dashboard>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <div class="flex items-center gap-4 mb-4">
                <flux:button href="{{ route('system.tenants.index') }}" variant="ghost" icon="arrow-left">
                    Back to Tenants
                </flux:button>
            </div>

            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tenant Details</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">View tenant information (Read-only)</p>
                </div>
            </div>
        </div>

        @if (session('success'))
            <x-ui.alert variant="success" class="mb-6">
                <x-ui.alert-description>
                    {{ session('success') }}
                </x-ui.alert-description>
            </x-ui.alert>
        @endif

        @if ($errors->any())
            <x-ui.alert variant="destructive" class="mb-6">
                <x-ui.alert-title>
                    There {{ $errors->count() === 1 ? 'was' : 'were' }} {{ $errors->count() }} error(s)
                </x-ui.alert-title>
                <x-ui.alert-description>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </x-ui.alert-description>
            </x-ui.alert>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Information -->
            <div class="lg:col-span-2 space-y-6">
                <flux:card>
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tenant Information</h2>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Tenant ID</label>
                                <p class="text-base text-gray-900 dark:text-white font-mono bg-gray-50 dark:bg-gray-800 px-3 py-2 rounded">{{ $tenant->id }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Created At</label>
                                <p class="text-base text-gray-900 dark:text-white">{{ $tenant->created_at->format('M d, Y H:i:s') }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Last Updated</label>
                            <p class="text-base text-gray-900 dark:text-white">{{ $tenant->updated_at->format('M d, Y H:i:s') }}</p>
                        </div>
                    </div>
                </flux:card>

                <flux:card>
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Owner Information</h2>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        @if ($user)
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Name</label>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Email</label>
                                    <p class="text-base text-gray-900 dark:text-white">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">User ID</label>
                                    <p class="text-base text-gray-900 dark:text-white font-mono text-sm bg-gray-50 dark:bg-gray-800 px-3 py-2 rounded">{{ $user->id }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Email Verified</label>
                                    <p class="text-base">
                                        @if ($user->email_verified_at)
                                            <flux:badge color="green">Verified</flux:badge>
                                        @else
                                            <flux:badge color="yellow">Not Verified</flux:badge>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">Owner information not available</p>
                        @endif
                    </div>
                </flux:card>

                <flux:card>
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tenant Data</h2>
                    </div>
                    <div class="px-6 py-4">
                        <pre class="text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded overflow-auto max-h-96"><code class="text-gray-900 dark:text-white">{{ json_encode($tenant->data, JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                </flux:card>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <flux:card>
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Statistics</h2>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Database Schema</label>
                            <p class="text-base text-gray-900 dark:text-white font-mono text-sm">w-{{ $tenant->id }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</label>
                            <flux:badge color="green">Active</flux:badge>
                        </div>
                    </div>
                </flux:card>

                <x-ui.alert variant="info">
                    <x-ui.alert-title>Read-Only Access</x-ui.alert-title>
                    <x-ui.alert-description>
                        As a Super Admin, you can view tenant details but cannot modify them. Tenant owners manage their own tenants.
                    </x-ui.alert-description>
                </x-ui.alert>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
