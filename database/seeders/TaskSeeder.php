<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Handle errors response',
            'status' => 'done',
        ]);

        Task::create([
            'title' => 'Build create ticket component',
            'status' => 'in-progress',
        ]);

        Task::create([
            'title' => 'Build update ticket component',
            'status' => 'to-do',
        ]);


        // Test trên 10 records
        // Task::factory()->count(20)->create();
    }
}