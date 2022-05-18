<?php

namespace Database\Seeders;

use App\Models\CourseLike;
use Illuminate\Database\Seeder;

class CourseLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseLike::factory()->times(1500)->create();
    }
}
