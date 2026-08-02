<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Usuarios registrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <p class="text-sm text-gray-500 dark:text-gray-400">Total de usuarios</p>
                <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Listado de usuarios</h3>

                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 text-left text-gray-500 dark:text-gray-400">
                                <th class="py-3 pe-4">Nombre</th>
                                <th class="py-3 pe-4">Email</th>
                                <th class="py-3 pe-4">Rol</th>
                                <th class="py-3 pe-4">Verificado</th>
                                <th class="py-3 pe-4">Registro</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="py-3 pe-4 text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                    <td class="py-3 pe-4 text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                                    <td class="py-3 pe-4 text-gray-600 dark:text-gray-300">{{ strtoupper($user->role) }}</td>
                                    <td class="py-3 pe-4 text-gray-600 dark:text-gray-300">{{ $user->email_verified_at ? 'Si' : 'No' }}</td>
                                    <td class="py-3 pe-4 text-gray-600 dark:text-gray-300">{{ $user->created_at?->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500 dark:text-gray-400">Aun no hay usuarios registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
