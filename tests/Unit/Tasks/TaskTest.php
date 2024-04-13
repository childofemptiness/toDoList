<?php

namespace Tests\Unit;

use App\Livewire\Tasks\Task;
use App\Livewire\Tasks\TaskForm;
use App\Models\Task as ModelsTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function testCanDeleteTask() {

        $task = ModelsTask::create([

            'name' => 'title',

            'description' => 'description'
        ]);

        Livewire::test(Task::class)

                ->call('delete', $task->id);

        $this->assertFalse(ModelsTask::where('id', $task->id)->exists());
    }
}
