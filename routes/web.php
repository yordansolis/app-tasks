<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TaskList;
use App\Livewire\Welcome;

// Ruta principal para la bienvenida
Route::get('/', Welcome::class)->name('welcome');

// Ruta principal para la gestión de tareas con Livewire
Route::get('/tasks', TaskList::class)->name('tasks.all');
