<?php

use App\Livewire\Counter;
use App\Livewire\Tasks\Task;
use App\Livewire\Tasks\TaskForm;
use App\Models\Status;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/tasks');

Route::view('dashboard', 'dashboard')

    ->middleware(['auth', 'verified'])

    ->name('dashboard');


Route::view('profile', 'profile')

    ->middleware(['auth'])

    ->name('profile');


Route::get('/tasks', Task::class)

    ->middleware(['auth'])

    ->name('tasks');
    
Route::get('/tasks/task-form', TaskForm::class);

// Route::get('/status', Status::class);

require __DIR__.'/auth.php';
