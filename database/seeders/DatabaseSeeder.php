<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Project::factory(10)->create();
        for ($i=0; $i < 50; $i++) {
            DB::table('project_user')->insert([
                'user_id' => \App\Models\User::all()->random()->id,
                'project_id' => \App\Models\Project::all()->random()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
