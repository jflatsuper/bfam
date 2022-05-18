<?php

namespace Database\Seeders;

use App\Models\CourseSection;
use Illuminate\Database\Seeder;

class CourseSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSection::factory()->times(900)->create();
    }
}
