<?php

namespace Database\Seeders;

use App\Models\CourseDislike;
use Illuminate\Database\Seeder;

class CourseDisLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseDislike::factory()->times(1500)->create();
    }
}
