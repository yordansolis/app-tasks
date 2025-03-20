<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
</head>
<body>
    <h1>Tareas</h1>

    <a href="{{ route('tasks.create') }}">Crear tarea</a>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->title }}</li>
            <li>{{ $task->description }}</li>
            <li>{{ $task->author }}</li>

            @if ($task->status == 1)
                <li>Completada</li>
            @else

                <li>Pendiente
                    <!-- <a href="{{ route('tasks.update', $task->id) }}">Completar</a> -->
                    <form action="{{ route('tasks.complete', $task->id) }}" method='post' style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit">Completar</button>
                    </form>
            </li>
            @endif
            
            {{ $task->created_at->format('d/m/Y') }}
            
            <br>
            <a href="{{ route('tasks.show', $task->id) }}">Editar</a>
            <br>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar esta tarea?');">
                    Eliminar
                </button>
            </form>
            <hr>
        @endforeach

    </ul>

    
    
</body>
</html>