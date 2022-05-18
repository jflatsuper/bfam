<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Database Table seeders
         * To be arranged accordingly in case of foreign keys
         * and relationships
         */
//        $this->call(UsersSeeder::class);
//        $this->call(InstructorsSeeder::class);
//        $this->call(StudentsSeeder::class);
//        $this->call(CoursesSeeder::class);
//        $this->call(CourseSectionsSeeder::class);
//        $this->call(CourseSectionContentsSeeder::class);
//        $this->call(SubtitlesSeeder::class);
//        $this->call(WhatToBeLearntSeeder::class);
//        $this->call(WhoIsThisCourseForSeeder::class);
//        $this->call(CourseRequirementsSeeder::class);
//        $this->call(CourseReviewsSeeder::class);
//        $this->call(CourseRatingsSeeder::class);
//        $this->call(PurchasesSeeder::class);
//        $this->call(WishListsSeeder::class);
//        $this->call(ShoppingCartsSeeder::class);
//        $this->call(TransactionSeeder::class);
        $this->call(CourseLikesSeeder::class);
        $this->call(CourseDisLikesSeeder::class);

    }
}
