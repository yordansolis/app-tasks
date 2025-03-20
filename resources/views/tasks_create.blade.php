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
                <li>Pendiente</li>
            @else
                <li>Completada</li>
            @endif
            
            {{ $task->created_at->format('d/m/Y') }}
            
            
            <a href="">Editar</a>
            <a href="">Eliminar</a>
            <hr>
        @endforeach

    </ul>

    
    
</body>
</html>