<?php

namespace Database\Seeders;

use App\Models\Taref;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taref::factory()->count(100)->create();
    }
}
