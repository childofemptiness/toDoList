<?php

namespace App\Livewire;

use App\Models\Status;
use Livewire\Attributes\On;
use Livewire\Component;

class StatusHistory extends Component
{
    public $statuses, $statusOptions;

    public $taskId = null;

    public $showModal = false;

    public function render()
    {
        $statuses = Status::where('task_id', $this->taskId)->get();

        $statusOptions = Status::getStatusOptions();

        $this->statusOptions = $statusOptions;

        $this->statuses = $statuses;

        return view('livewire.status-history');
    }

    #[On('show-status-history')]
    public function showStatusHistory($taskId) {

        $this->taskId = $taskId;

        $this->toggleModal();
    }

    public function toggleModal() {

        $this->showModal = !$this->showModal;
    }
}
