<?php

namespace App\Livewire\Tasks;

use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Task extends Component
{
    public $tasks, $task;

    public $showStatus = false;

    public $updateMode = false;

    #[On(['task-created', 'task-updated'])]
    public function render() {

        $tasks = ModelsTask::with('status')->get();
        
        $this->tasks = $tasks;

        return view('livewire.tasks');
    }
    
   public function edit($id) {

        $this->task = ModelsTask::with('status')->findOrFail($id);

        $this->dispatch('task-edited', 
        
            updateMode : true, 
            
            task : $this->task,
        );
   }

    public function delete($id) {

        ModelsTask::find($id)->delete();
    }
    
    public function showStatusHistory() {

        $this->showStatus = true;

        Log::info($this->showStatus);

        $this->dispatch('show-status-history');

    }
}
