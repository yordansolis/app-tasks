<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    

    // mostrar todas las tareas  ✅
    public function show_all()
    {
       
        $tasks = Task::all();
        
        return view('show_all', compact('tasks'));
    }



    // mostrar el formulario para crear una nueva tarea ✅
    public function view_create()
    {
        return view('tasks_create_view');
    }



    // crear un nuevo registro ✅
    public function tasks_create(Request $request)
    {   
        // Uncomment for debugging
        // dd($request->all());

        try{ 
            $task = new Task();
            $task->title = $request->title;
            $task->description = $request->description;
            $task->author = $request->author;
            
            // si el estado es 1, entonces la tarea esta pendiente, si es 0, entonces la tarea esta completada
            $task->status = $request->has('status') ? 1 : 0;

            $task->save();

            // Redirigir a la vista de todas las tareas
            return redirect()->route('tasks.all');
        } catch (\Exception $e) {
            // Registrar error en log específico
            Log::channel('tasks')->error('Error al crear la tarea: ' . $e->getMessage());
            Log::channel('tasks')->error('Stack trace: ' . $e->getTraceAsString());
            
            // Mostrar detalles completos del error en desarrollo
            if (config('app.debug')) {
                return back()->withInput()->with('error', 'Error: ' . $e->getMessage());
            }
            
            return redirect()->back()->withInput()->withErrors('Error al crear la tarea: ' . $e->getMessage());
        }
    }



    // mostrar un registro ✅
    public function show($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()->route('tasks.all')->with('error', 'Tarea no encontrada');
        }
        return view('update_view', compact('task'));
    }


    // actualizar un registro ✅
    public function update(Request $request, $id)
    {

        // dd($request->all());

        $task = Task::find($id);

        if ($request->has('title')) {
            $task->title = $request->title;
        }

        if ($request->has('description')) {
            $task->description = $request->description;
        }

        if ($request->has('status')) {
            $task->status = 1;
        } else {
            $task->status = 0;
        }

        if ($request->has('author')) {
            $task->author = $request->author;
        }

        $task->save();

        return redirect()->route('tasks.all');

       
    }

    public function destroy($id)
    {
        // Busca la tarea y la elimina
        $task = Task::findOrFail($id);
        $task->delete();
    
        return redirect()->route('tasks.all')->with('success', 'Tarea eliminada correctamente.');
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 1;
        $task->save();
        return redirect()->route('tasks.all')->with('success', 'Tarea completada correctamente.');
    }
    
    

    
    
}
