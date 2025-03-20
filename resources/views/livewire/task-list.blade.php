<div>
    <div class="p-4 bg-white rounded-lg shadow-md">
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">
                Gestión de Tareas
            </h2>
            
            @livewire('task-create')
        </div>

        <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="w-full md:w-1/2">
                <div class="relative">
                    <input 
                        wire:model.live.debounce.300ms="search" 
                        type="text" 
                        class="w-full py-2 px-4 pr-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Buscar por título, descripción o autor..."
                    >
                    <svg class="absolute right-3 top-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            
            <div class="flex gap-2">
                <select 
                    wire:model.live="filter" 
                    class="py-2 px-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Todas las tareas</option>
                    <option value="completed">Completadas</option>
                    <option value="pending">Pendientes</option>
                </select>
                
                <button 
                    wire:click="resetFilters"
                    class="py-2 px-4 bg-gray-200 hover:bg-gray-300 rounded-md transition duration-200"
                >
                    Resetear
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            @if ($tasks->isEmpty())
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No hay tareas</h3>
                    <p class="mt-1 text-gray-500">No se encontraron tareas que coincidan con tu búsqueda.</p>
                </div>
            @else
                <table class="min-w-full border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($tasks as $task)
                            <tr wire:key="task-{{ $task->id }}" class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $task->title }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500">
                                    {{ Str::limit($task->description, 50) }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $task->author }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $task->status ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $task->status ? 'Completada' : 'Pendiente' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $task->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex space-x-2">
                                        <button 
                                            wire:click="toggleTaskStatus({{ $task->id }})"
                                            class="text-blue-600 hover:text-blue-900 focus:outline-none"
                                            title="{{ $task->status ? 'Marcar como pendiente' : 'Marcar como completada' }}"
                                        >
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            wire:click="$dispatch('openEditModal', { id: {{ $task->id }} })"
                                            class="text-indigo-600 hover:text-indigo-900 focus:outline-none"
                                            title="Editar tarea"
                                        >
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        
                                        <button 
                                            wire:click="deleteTask({{ $task->id }})" 
                                            wire:confirm="¿Estás seguro de que deseas eliminar esta tarea?"
                                            class="text-red-600 hover:text-red-900 focus:outline-none"
                                            title="Eliminar tarea"
                                        >
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
    
    @livewire('task-edit')
</div>
