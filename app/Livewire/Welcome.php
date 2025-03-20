<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\View\View;

class Welcome extends Component
{
    public $totalTasks = 0;
    public $completedTasks = 0;
    public $pendingTasks = 0;

    public function mount()
    {
        $this->updateStats();
    }

    public function render(): View
    {
        return view('livewire.welcome')->layout('layouts.app');
    }

    private function updateStats()
    {
        $this->totalTasks = Task::count();
        $this->completedTasks = Task::where('status', 1)->count();
        $this->pendingTasks = Task::where('status', 0)->count();
    }
}
