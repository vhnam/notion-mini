<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <div class="flex items-center gap-4 mb-4">
                <flux:button href="{{ route('system.tenants.index') }}" variant="ghost" icon="arrow-left">
                    Back to Tenants
                </flux:button>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Create New Tenant</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Add a new tenant to the system</p>
        </div>

        @if ($errors->any())
            <x-ui.alert variant="destructive" class="mb-6">
                <x-ui.alert-title>
                    There {{ $errors->count() === 1 ? 'was' : 'were' }} {{ $errors->count() }} error(s) with your submission
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

        <form action="{{ route('system.tenants.store') }}" method="POST">
            @csrf

            <flux:card class="mb-6">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Tenant Information</h2>
                </div>
                <div class="px-6 py-6 space-y-6">
                    <div>
                        <flux:label for="tenant_id">
                            Tenant ID <span class="text-red-500">*</span>
                        </flux:label>
                        <flux:input
                            id="tenant_id"
                            name="tenant_id"
                            type="text"
                            placeholder="e.g., acme-corp, john-doe"
                            value="{{ old('tenant_id') }}"
                            required
                            pattern="[a-z0-9-]+"
                        />
                        <flux:description>
                            Unique identifier for the tenant. Use lowercase letters, numbers, and hyphens only.
                        </flux:description>
                        @error('tenant_id')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>
                </div>
            </flux:card>

            <flux:card class="mb-6">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Owner Information</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">This will create a new user account for the tenant owner</p>
                </div>
                <div class="px-6 py-6 space-y-6">
                    <div>
                        <flux:label for="user_name">
                            Full Name <span class="text-red-500">*</span>
                        </flux:label>
                        <flux:input
                            id="user_name"
                            name="user_name"
                            type="text"
                            placeholder="John Doe"
                            value="{{ old('user_name') }}"
                            required
                        />
                        @error('user_name')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <div>
                        <flux:label for="user_email">
                            Email Address <span class="text-red-500">*</span>
                        </flux:label>
                        <flux:input
                            id="user_email"
                            name="user_email"
                            type="email"
                            placeholder="john@example.com"
                            value="{{ old('user_email') }}"
                            required
                        />
                        @error('user_email')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <flux:label for="password">
                                Password <span class="text-red-500">*</span>
                            </flux:label>
                            <flux:input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="••••••••"
                                required
                            />
                            <flux:description>
                                Minimum 8 characters
                            </flux:description>
                            @error('password')
                                <flux:error>{{ $message }}</flux:error>
                            @enderror
                        </div>

                        <div>
                            <flux:label for="password_confirmation">
                                Confirm Password <span class="text-red-500">*</span>
                            </flux:label>
                            <flux:input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                placeholder="••••••••"
                                required
                            />
                            @error('password_confirmation')
                                <flux:error>{{ $message }}</flux:error>
                            @enderror
                        </div>
                    </div>
                </div>
            </flux:card>

            <div class="flex justify-end gap-3">
                <flux:button href="{{ route('system.tenants.index') }}" variant="ghost">
                    Cancel
                </flux:button>
                <flux:button type="submit" variant="primary" icon="plus">
                    Create Tenant
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts.dashboard>
