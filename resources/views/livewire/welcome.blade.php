<div>
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 min-h-[50vh] flex items-center">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Gestor de Tareas con Laravel & Livewire
                </h1>
                <p class="text-xl text-blue-100 mb-8">
                    Una aplicación reactiva y moderna para gestionar tus tareas de forma eficiente
                </p>
                <a href="{{ route('tasks.all') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 focus:outline-none transition duration-300">
                    Ver Tareas
                    <svg class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Estadísticas de Tareas</h2>
                <p class="mt-4 text-lg text-gray-600">Resumen del estado actual de tus tareas</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-lg font-medium text-gray-600">Total de Tareas</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalTasks }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-blue-100">
                            <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-lg font-medium text-gray-600">Tareas Completadas</p>
                            <h3 class="text-3xl font-bold text-green-600 mt-2">{{ $completedTasks }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-green-100">
                            <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-lg font-medium text-gray-600">Tareas Pendientes</p>
                            <h3 class="text-3xl font-bold text-yellow-600 mt-2">{{ $pendingTasks }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-yellow-100">
                            <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Características</h2>
                <p class="mt-4 text-lg text-gray-600">Funcionalidades de nuestro gestor de tareas</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="p-3 rounded-full bg-blue-100 inline-block mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Crear Tareas</h3>
                    <p class="text-gray-600">Crea nuevas tareas con toda la información necesaria para organizar tu trabajo.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="p-3 rounded-full bg-green-100 inline-block mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Editar en Tiempo Real</h3>
                    <p class="text-gray-600">Actualiza la información de tus tareas de forma reactiva sin recargar la página.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="p-3 rounded-full bg-purple-100 inline-block mb-4">
                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Filtrar y Buscar</h3>
                    <p class="text-gray-600">Filtra rápidamente tus tareas por estado o busca por texto para encontrar lo que necesitas.</p>
                </div>
            </div>
        </div>
    </div>
</div>
