<?php

namespace App\Livewire\Tasks;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class TaskForm extends Component
{
    public $task, $name, $description, $selectedStatus, $statusOptions, $taskId;

    public $updateMode = false;
    
    public $showModal = false;

    public function mount() {

        $this->showModal = false;
    }

    private function resetInputFields() {

        $this->name = '';

        $this->description = '';

        $this->selectedStatus = '';
    }

    public function render() {

        $this->statusOptions = Status::getStatusOptions();

        return view('livewire.tasks.task-form', ['statusOptions' => $this->statusOptions]);
    }

    public function submit() {

        if ($this->updateMode) {

            $this->update();
        }

        else $this->store();
    }

    #[On('task-edited')]
    public function isUpdate($updateMode, $task) {

        $this->updateMode = $updateMode;

        $this->task = $task;

        $this->taskId = $task['id'];

        $this->name = $task['name'];

        $this->description = $task['description'];

        $this->selectedStatus = $task['status']['status'];

        $this->toggleModal();
    }

    public function toggleModal() {

        if ($this->showModal && $this->updateMode) {
            
            $this->resetInputFields();

            $this->updateMode = false;
        }

        $this->showModal = !$this->showModal;
    }

    public function store() {

        $task = Task::create([

            'name' => $this->name,

            'description' => $this->description,
        ]);
    
        Status::create([
            
            'task_id' => $task->id,

            'status' => $this->selectedStatus,
        ]);

        $this->dispatch('task-created');

        $this->toggleModal();
    }

    public function update() {

        $this->validate([

            'name' => 'required',

            'description' => 'required',

            'selectedStatus' => 'required',
        ]);

        $task = Task::find($this->taskId);

        $task->create([

            'name' => $this->name,

            'description' => $this->description,
        ]);

        $status = Status::where('task_id', $this->taskId)->first();

        $status->update([

            'status' => $this->selectedStatus,
        ]);

        $this->dispatch('task-updated');

        $this->toggleModal();
    }
}
