<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Newsletter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('newsletter_success'))
                <div class="p-4 bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-200 dark:border-emerald-700">
                    {{ session('newsletter_success') }}
                </div>
            @endif

            @if (session('newsletter_error'))
                <div class="p-4 bg-red-50 text-red-800 rounded-lg border border-red-200 dark:bg-red-900/30 dark:text-red-200 dark:border-red-700">
                    {{ session('newsletter_error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="p-4 bg-red-50 text-red-800 rounded-lg border border-red-200 dark:bg-red-900/30 dark:text-red-200 dark:border-red-700">
                    <ul class="list-disc ps-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total suscriptores</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $totalSubscribers }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Nuevos hoy</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900 dark:text-gray-100">{{ $subscribersToday }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Enviar campana masiva</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Se encola un correo por suscriptor para evitar bloqueos del servidor.</p>

                <form method="POST" action="{{ route('newsletter.send') }}" class="mt-4 space-y-4">
                    @csrf
                    <div>
                        <x-input-label for="subject" :value="__('Asunto')" />
                        <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" :value="old('subject')" required maxlength="180" />
                    </div>

                    <div>
                        <x-input-label for="body" :value="__('Mensaje')" />
                        <textarea
                            id="body"
                            name="body"
                            rows="8"
                            required
                            maxlength="10000"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Escribe el contenido del correo..."
                        >{{ old('body') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>{{ __('Enviar a suscriptores') }}</x-primary-button>
                    </div>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Suscriptores</h3>

                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700 text-left text-gray-500 dark:text-gray-400">
                                <th class="py-3 pe-4">Email</th>
                                <th class="py-3 pe-4">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td class="py-3 pe-4 text-gray-900 dark:text-gray-100">{{ $subscriber->email }}</td>
                                    <td class="py-3 pe-4 text-gray-600 dark:text-gray-300">{{ $subscriber->created_at?->format('Y-m-d H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-6 text-center text-gray-500 dark:text-gray-400">Aun no hay suscriptores.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $subscribers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>