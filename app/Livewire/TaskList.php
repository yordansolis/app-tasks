<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithPagination;
use Illuminate\View\View;

class TaskList extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = '';
    protected $listeners = ['taskAdded' => '$refresh', 'taskUpdated' => '$refresh'];

    public function render(): View
    {
        $query = Task::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('author', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filter === 'completed') {
            $query->where('status', 1);
        } elseif ($this->filter === 'pending') {
            $query->where('status', 0);
        }

        $tasks = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.task-list', [
            'tasks' => $tasks
        ])->layout('layouts.app');
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            session()->flash('message', 'Tarea eliminada correctamente');
        }
    }

    public function toggleTaskStatus($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->status = !$task->status;
            $task->save();
            session()->flash('message', $task->status ? 'Tarea completada' : 'Tarea marcada como pendiente');
        }
    }

    public function resetFilters()
    {
        $this->reset(['search', 'filter']);
        $this->resetPage();
    }
}
