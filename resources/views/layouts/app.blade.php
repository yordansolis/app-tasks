<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas</title>
    <!-- Tailwind CSS con CDN (en producción usar npm) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Agregar Alpine.js (requerido por Livewire) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="/" class="text-xl font-bold">Gestor de Tareas</a>
                <div class="flex space-x-4">
                    <a href="{{ route('tasks.all') }}" class="hover:text-blue-200 transition duration-200">Tareas</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <main>
            {{ $slot }}
        </main>
    </div>
    
    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} Gestor de Tareas. Todos los derechos reservados.</p>
                <div class="mt-4 md:mt-0">
                    <p>Desarrollado con Laravel & Livewire</p>
                </div>
            </div>
        </div>
    </footer>
    
    @livewireScripts
</body>
</html> 