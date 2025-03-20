<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Editar tarea</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $task->title }}">
    <input type="text" name="description" value="{{ $task->description }}">
    <input type="text" name="author" value="{{ $task->author }}">   
    <input type="checkbox" name="status" value="1" {{ $task->status == 1 ? 'checked' : '' }}>
    <button type="submit">Editar</button>

    <a href="{{ route('tasks.all') }}">Volver</a>
</form>

</body>
</html>