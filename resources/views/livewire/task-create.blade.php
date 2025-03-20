<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if (!$showForm)
        <button 
            wire:click="toggleForm"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 flex items-center"
        >
            <svg class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Nueva Tarea
        </button>
    @else
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Crear Nueva Tarea</h3>
                <button 
                    wire:click="toggleForm"
                    class="text-gray-400 hover:text-gray-600"
                >
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form wire:submit="createTask">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <input 
                        wire:model="title" 
                        type="text" 
                        id="title" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Título de la tarea"
                    >
                    @error('title') 
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <textarea 
                        wire:model="description" 
                        id="description" 
                        rows="3" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Descripción detallada de la tarea"
                    ></textarea>
                    @error('description') 
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Autor</label>
                    <input 
                        wire:model="author" 
                        type="text" 
                        id="author" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nombre del autor"
                    >
                    @error('author') 
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="flex items-center">
                        <input 
                            wire:model="status" 
                            type="checkbox" 
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >
                        <span class="ml-2 text-sm text-gray-700">Tarea completada</span>
                    </label>
                </div>
                
                <div class="flex justify-end">
                    <button 
                        type="button"
                        wire:click="toggleForm"
                        class="px-4 py-2 mr-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition duration-200"
                    >
                        Cancelar
                    </button>
                    <button 
                        type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
