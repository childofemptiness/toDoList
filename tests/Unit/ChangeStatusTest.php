<?php

namespace Tests\Unit;

use App\Livewire\ChangeStatus;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;
use Tests\TestCase;


class ChangeStatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function testCanChangeTaskStatus() {

      $task = Task::factory()

            ->has(Status::factory())

            ->create();

        Livewire::test(ChangeStatus::class, ['taskId' => $task->id])

                ->set('taskId', $task->id)

                ->set('changeStatus', 'Выполнена')

                ->call('update');

        $updatedStatus = Status::where('task_id', $task->id)->latest('id')->first();

        $this->assertEquals('Выполнена', $updatedStatus->status);
    }
}
