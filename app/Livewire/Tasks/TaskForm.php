<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class TaskForm extends Component
{
    public $task, $name, $description, $status, $taskId;

    public $updateMode = false;
    
    public $showModal = false;

    public function mount() {

        $this->showModal = false;
    }

    public function render() {

        return view('livewire.tasks.task-form');
    }

    public function submit() {

        if ($this->updateMode) {

            $this->update();
        }

        else $this->store();
    }

    #[On('task-edited')]
    public function isUpdate($updateMode, $task) {

        Log::info($task);
        $this->updateMode = $updateMode;

        $this->task = $task;

        $this->name = $task['name'];

        $this->description = $task['description'];

        $this->status = $task['status'];

        $this->toggleModal();
    }

    public function toggleModal() {

        if ($this->showModal && $this->updateMode) {
            
            $this->resetInputFields();

            $this->updateMode = false;
        }

        $this->showModal = !$this->showModal;
    }

    private function resetInputFields() {

        $this->name = '';

        $this->description = '';
    }

    public function store() {

        Task::create([

            'name' => $this->name,

            'description' => $this->description,
        ]);

        $this->resetInputFields();
    }

    public function update() {

        $this->validate([

            'name' => 'required',

            'description' => 'required',
        ]);

        $task = Task::find($this->taskId);

        $task->update([

            'name' => $this->name,

            'description' => $this->description,
        ]);
        
        $this->resetInputFields();

        $this->toggleModal();

        $this->updateMode = false;

        $this->resetInputFields();
    }
}
