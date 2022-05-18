<?php

namespace Database\Seeders;

use App\Models\CourseReview;
use Illuminate\Database\Seeder;

class CourseReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseReview::factory()->times(200)->create();
    }
}
