<?php

namespace App\Livewire;

use App\Models\Status;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class ChangeStatus extends Component
{
    public $taskId, $statusOptions, $changedStatus;

    public $showModal = false;

    public function render()
    {
        $statusOptions = Status::getStatusOptions();

        $this->statusOptions = $statusOptions;

        return view('livewire.change-status', ['statusOptions' => $statusOptions]);
    }

    #[On('edit-status')]
    public function edit($taskId) {

        $this->taskId = $taskId;

        $this->toggleModal();
    }

    public function update() {

        $this->validate([

            'changedStatus' => 'required',
        ]);

        $status = Status::where('task_id', $this->taskId)->first();

        $status->create([

            'task_id' => $this->taskId,

            'status' => $this->changedStatus,
        ]);

        $this->dispatch('status-updated');

        $this->toggleModal();
    }

    public function toggleModal() {

        $this->showModal = !$this->showModal;
    }
}
