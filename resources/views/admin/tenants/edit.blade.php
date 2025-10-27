<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <div class="flex items-center gap-4 mb-4">
                <flux:button href="{{ route('system.tenants.show', $tenant->id) }}" variant="ghost" icon="arrow-left">
                    Back to Tenant
                </flux:button>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Tenant</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update tenant information</p>
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

        <form action="{{ route('system.tenants.update', $tenant->id) }}" method="POST">
            @csrf
            @method('PUT')

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
                            value="{{ old('tenant_id', $tenant->id) }}"
                            required
                            pattern="[a-z0-9-]+"
                        />
                        <flux:description>
                            Changing the tenant ID is complex and may affect database schemas. Use with caution.
                        </flux:description>
                        @error('tenant_id')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <div>
                        <flux:label>Current Tenant Data</flux:label>
                        <pre class="text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded overflow-auto max-h-64"><code class="text-gray-900 dark:text-white">{{ json_encode($tenant->data, JSON_PRETTY_PRINT) }}</code></pre>
                    </div>
                </div>
            </flux:card>

            @if ($user)
                <flux:card class="mb-6">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Owner Information</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">To update owner details, manage the user directly</p>
                    </div>
                    <div class="px-6 py-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <flux:label>Full Name</flux:label>
                                <div class="mt-1 text-sm text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-800 px-3 py-2 rounded">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div>
                                <flux:label>Email Address</flux:label>
                                <div class="mt-1 text-sm text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-800 px-3 py-2 rounded">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <flux:label>User ID</flux:label>
                            <div class="mt-1 text-sm text-gray-900 dark:text-white font-mono bg-gray-50 dark:bg-gray-800 px-3 py-2 rounded">
                                {{ $user->id }}
                            </div>
                        </div>
                    </div>
                </flux:card>
            @endif

            <div class="flex justify-between">
                <form action="{{ route('system.tenants.destroy', $tenant->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tenant? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <flux:button type="submit" variant="danger" icon="trash">
                        Delete Tenant
                    </flux:button>
                </form>

                <div class="flex gap-3">
                    <flux:button href="{{ route('system.tenants.show', $tenant->id) }}" variant="ghost">
                        Cancel
                    </flux:button>
                    <flux:button type="submit" variant="primary" icon="check">
                        Update Tenant
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.dashboard>
