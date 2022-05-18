<?php

namespace Database\Seeders;

use App\Models\WishList;
use Illuminate\Database\Seeder;

class WishListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WishList::factory()->times(200)->create();
    }
}
