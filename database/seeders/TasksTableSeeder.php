<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()

            ->has(Status::factory()->count(5))

            ->create();
    }
}
