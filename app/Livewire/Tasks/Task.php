<?php

namespace App\Livewire\Tasks;

use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Task extends Component
{
    public $tasks, $task, $name, $description, $status, $taskId;

    public $updateMode = false;

    public function render() {
        
        $tasks = ModelsTask::all() ?? collect();

        $this->tasks = $tasks;

        return view('livewire.tasks', compact('tasks'));
    }
    
   public function edit($id) {

        $this->task = ModelsTask::findOrFail($id);

        $this->dispatch('task-edited', 
        
            updateMode : true, 
            
            task : $this->task,
        );
   }

    public function delete($id) {

        ModelsTask::find($id)->delete();

        session()->flash('message', 'Task Updated Successfully');
    }
}
