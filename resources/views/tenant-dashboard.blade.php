<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard - {{ $tenantId }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-900">
                            {{ $tenantId }}
                        </h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900">
                            Back to Home
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-6 sm:px-0">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">
                            Welcome to Your Tenant Dashboard
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tenant Info Card -->
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-blue-900 mb-3">
                                    Tenant Information
                                </h3>
                                <div class="space-y-2">
                                    <p><span class="font-medium">Tenant ID:</span> {{ $tenantId }}</p>
                                    @if($tenant && $tenant->data)
                                        <p><span class="font-medium">User ID:</span> {{ $tenant->data['user_id'] ?? 'N/A' }}</p>
                                        <p><span class="font-medium">User Name:</span> {{ $tenant->data['user_name'] ?? 'N/A' }}</p>
                                        <p><span class="font-medium">User Email:</span> {{ $tenant->data['user_email'] ?? 'N/A' }}</p>
                                        <p><span class="font-medium">Created:</span> {{ $tenant->data['created_at'] ?? 'N/A' }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Quick Actions Card -->
                            <div class="bg-green-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-green-900 mb-3">
                                    Quick Actions
                                </h3>
                                <div class="space-y-3">
                                    <a href="#" class="block w-full bg-green-600 text-white text-center py-2 px-4 rounded hover:bg-green-700 transition">
                                        Create New Item
                                    </a>
                                    <a href="#" class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded hover:bg-blue-700 transition">
                                        View Items
                                    </a>
                                    <a href="#" class="block w-full bg-purple-600 text-white text-center py-2 px-4 rounded hover:bg-purple-700 transition">
                                        Settings
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Status Message -->
                        <div class="mt-6 bg-yellow-50 border border-yellow-200 rounded-md p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-800">
                                        <strong>Multi-tenant mode active!</strong> You are currently viewing your personal tenant space. 
                                        All data and actions here are isolated to your tenant.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
