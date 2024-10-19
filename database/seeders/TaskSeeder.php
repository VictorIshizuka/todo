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
            'title'=>'Minha Task exemplo',
            'description'=>'descrição exemplo',
            'due_date'=>'2024-10-17 00:00:00',
            'user_id'=> 1,
            'category_id'=>1
        ]);
        Task::create([
            'is_done'=> true,
           'title'=>'Minha Task exemplo 2',
            'description'=>'descrição exemplo 2',
            'due_date'=>'2024-10-18 00:00:00',
            'user_id'=> 1,
            'category_id'=>2
        ]);
    }
}