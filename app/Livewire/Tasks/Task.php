<?php

namespace App\Livewire\Tasks;

use App\Models\Status;
use App\Models\Task as ModelsTask;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $task, $taskId, $filter, $statusOptions;

    public $showStatus = false;

    public $updateMode = false;

    public function mount() {

        $this->statusOptions = Status::getStatusOptions();
    }

    public function search() {

        $this->resetPage();
    }

    #[On(['task-created', 'task-updated', 'status-updated'])]
    public function render() {

       if (!empty($this->filter)) {

        $tasks = ModelsTask::whereHas('statuses', function ($query) {

            $query->where('id', function ($query) {

                $query->select('id')

                      ->from('statuses')

                      ->whereColumn('task_id', 'tasks.id')

                      ->latest('id')

                      ->limit(1);

            })->where('status', $this->filter);

        })->paginate(5);
       }

       else $tasks = ModelsTask::with('status')->paginate(5);
        
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
