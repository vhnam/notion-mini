<x-layouts.dashboard>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <div class="flex items-center gap-4 mb-4">
                <flux:button href="{{ route('my-tenant.show') }}" variant="ghost" icon="arrow-left">
                    Back to My Tenant
                </flux:button>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit My Tenant</h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Update your tenant settings</p>
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

        <form action="{{ route('my-tenant.update') }}" method="POST">
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
                            Use lowercase letters, numbers, and hyphens only. This will affect your workspace URL.
                        </flux:description>
                        @error('tenant_id')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </div>

                    <x-ui.alert variant="warning">
                        <x-ui.alert-title>Important</x-ui.alert-title>
                        <x-ui.alert-description>
                            Changing your tenant ID may affect existing links and integrations. Make sure to update any saved references after changing this value.
                        </x-ui.alert-description>
                    </x-ui.alert>
                </div>
            </flux:card>

            <flux:card class="mb-6">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Owner Information</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">This information is managed through your profile settings</p>
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
                </div>
            </flux:card>

            <div class="flex justify-between">
                <form action="{{ route('my-tenant.destroy') }}" method="POST" onsubmit="return confirm('Are you absolutely sure? This will delete your tenant and all data. This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <flux:button type="submit" variant="danger" icon="trash">
                        Delete Tenant
                    </flux:button>
                </form>

                <div class="flex gap-3">
                    <flux:button href="{{ route('my-tenant.show') }}" variant="ghost">
                        Cancel
                    </flux:button>
                    <flux:button type="submit" variant="primary" icon="check">
                        Save Changes
                    </flux:button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.dashboard>
