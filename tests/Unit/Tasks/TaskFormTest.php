<?php

namespace Tests\Unit;

use App\Models\Task as ModelsTask;
use App\Livewire\Tasks\TaskForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TaskFormTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function testCanCreateTask() {

        Livewire::test(TaskForm::class)
                
                ->set('name', 'title')

                ->set('description', 'description')

                ->call('store');

        $this->assertTrue(ModelsTask::where('name', 'title')->exists());
    }

    public function testCanUpdateTask() {

        $task = ModelsTask::create([

            'name' => 'Old Title',

            'description' => 'Old description'
        ]);

        Livewire::test('tasks.task-form', ['taskId' => $task->id])

                ->set('name', 'New title')

                ->set('description', 'New description')

                ->call('update');

        $this->assertDatabaseHas('tasks', [

            'name' => 'New title',

            'description' => 'New description',
        ]);
    }
}
