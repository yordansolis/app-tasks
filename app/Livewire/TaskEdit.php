<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskEdit extends Component
{
    public $taskId;
    public $title;
    public $description;
    public $author;
    public $status;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required',
        'author' => 'required',
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio',
        'title.min' => 'El título debe tener al menos 3 caracteres',
        'description.required' => 'La descripción es obligatoria',
        'author.required' => 'El autor es obligatorio',
    ];

    protected $listeners = ['openEditModal'];

    public function render()
    {
        return view('livewire.task-edit');
    }

    public function openEditModal($id)
    {
        $this->taskId = $id;
        $task = Task::find($id);
        
        if ($task) {
            $this->title = $task->title;
            $this->description = $task->description;
            $this->author = $task->author;
            $this->status = $task->status;
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['taskId', 'title', 'description', 'author', 'status']);
        $this->resetValidation();
    }

    public function updateTask()
    {
        $this->validate();

        $task = Task::find($this->taskId);
        
        if ($task) {
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
                'author' => $this->author,
                'status' => $this->status ? 1 : 0,
            ]);

            session()->flash('message', 'Tarea actualizada correctamente');
            $this->closeModal();
            $this->dispatch('taskUpdated');
        }
    }
}
