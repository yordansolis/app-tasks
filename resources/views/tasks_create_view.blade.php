<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <style>
        .alert-error {
            color: white;
            background-color: #e74c3c;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Crear Tarea</h1>
    
    @if($errors->any())
    <div class="alert-error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
    @endif
    
    <form action="{{ route('tasks.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Título" value="{{ old('title') }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control"
             placeholder="Descripción">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" id="author" name="author" class="form-control" placeholder="Autor" value="{{ old('author') }}" required>
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                Estado (marcar como completada)
            </label>
        </div>

        <button type="submit">Crear</button>
    </form>
</body>
</html> 