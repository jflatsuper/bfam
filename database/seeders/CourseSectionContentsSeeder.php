<?php

namespace Database\Seeders;

use App\Models\CourseSectionContent;
use Illuminate\Database\Seeder;

class CourseSectionContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSectionContent::factory()->times(1000)->create();
    }
}
