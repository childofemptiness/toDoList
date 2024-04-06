<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Tasks extends Component
{
    public $tasks, $name, $description, $taskId;

    public $updateMode = false;

    public function render() {
        
        $tasks = Task::all() ?? collect();

        $this->tasks = $tasks;

        return view('livewire.tasks', compact('tasks'));
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

        return redirect()->to('/tasks');
    }

    public function edit($id) {

        $task = Task::findOrFail($id);

        $this->taskId = $id;

        $this->name = $task->name;

        $this->description = $task->description;

        $this->updateMode = true;
    }

    public function update() {

        $validateDate = $this->validate([

            'name' => 'required',

            'description' => 'required',
        ]);

        $task = Task::find($this->taskId);

        $task->update([

            'name' => $this->name,

            'description' => $this->description,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Task Updated Successfully');

        $this->resetInputFields();
    }

    public function delete($id) {

        Task::find($id)->delete();

        session()->flash('message', 'Task Updated Successfully');
    }
}
