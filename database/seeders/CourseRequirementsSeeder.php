<?php

namespace Database\Seeders;

use App\Models\CourseRequirement;
use Illuminate\Database\Seeder;

class CourseRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseRequirement::factory()->times(1000)->create();
    }
}
