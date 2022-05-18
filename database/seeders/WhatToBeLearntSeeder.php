<?php

namespace Database\Seeders;

use App\Models\WhatToBeLearntFromCourse;
use Illuminate\Database\Seeder;

class WhatToBeLearntSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhatToBeLearntFromCourse::factory()->times(1000)->create();
    }
}
