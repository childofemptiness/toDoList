<?php

namespace App\Livewire\Tasks;

use App\Models\Task as ModelsTask;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $task, $taskId;

    public $showStatus = false;

    public $updateMode = false;

    #[On(['task-created', 'task-updated', 'status-updated'])]
    public function render() {

        $tasks = ModelsTask::with('status')->paginate(5);
 
        return view('livewire.tasks', compact('tasks'));
    }
    
   public function edit($id) {

        $this->task = ModelsTask::with('status')->findOrFail($id);

        $this->dispatch('task-edited', 
        
            updateMode : true, 
            
            task : $this->task,
        );
   }
    public function editStatus($taskId) {

        $this->dispatch('edit-status', taskId : $taskId);
    }

    public function delete($id) {

        ModelsTask::find($id)->delete();
    }
    
    public function showStatusHistory($taskId) {

        $this->showStatus = true;

        $this->taskId = $taskId;

        $this->dispatch('show-status-history', taskId : $taskId);
    }
}
