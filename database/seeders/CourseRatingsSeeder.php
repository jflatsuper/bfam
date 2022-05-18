<?php

namespace Database\Seeders;

use App\Models\CourseRating;
use Illuminate\Database\Seeder;

class CourseRatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseRating::factory()->times(1000)->create();
    }
}
