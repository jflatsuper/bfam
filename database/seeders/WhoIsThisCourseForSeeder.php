<?php

namespace Database\Seeders;

use App\Models\WhoThisCourseIsFor;
use Illuminate\Database\Seeder;

class WhoIsThisCourseForSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WhoThisCourseIsFor::factory()->times(500)->create();
    }
}
