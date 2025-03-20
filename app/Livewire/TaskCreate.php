<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskCreate extends Component
{
    public $title = '';
    public $description = '';
    public $author = '';
    public $status = false;
    public $showForm = false;

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

    public function render()
    {
        return view('livewire.task-create');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->resetForm();
    }

    public function createTask()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'status' => $this->status ? 1 : 0,
        ]);

        $this->resetForm();
        $this->showForm = false;
        
        session()->flash('message', 'Tarea creada correctamente');
        $this->dispatch('taskAdded');
    }

    private function resetForm()
    {
        $this->reset(['title', 'description', 'author', 'status']);
        $this->resetValidation();
    }
}
