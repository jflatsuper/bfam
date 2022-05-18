<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $texts = array(
            'Development', 'Business', 'Finance & Accounting', 'IT & Software',
            'Official Productivity', 'Personal Development', 'Design', 'Marketing',
            'Lifestyle', 'Photography', 'Health & Fitness', 'Music', 'Teaching & Academics'
            );
        $key = array_rand($texts);

        $cover_images = array('01.jpg', '02.jpg', '03.jpg', '04.jpg');
        $cover_images_key = array_rand($cover_images);

        return [
            'user_id'                   => Instructor::inRandomOrder()->first()->id,
            'title'                     => $title =  $this->faker->text(100),
            'type'                      => rand(0, 1) ? Course::PREMIUM_COURSE : Course::FREE_COURSE,
            'category'                  => $texts[$key],
            'price'                     => $this->faker->numberBetween(200, 1000),
            'slug'                      => Str::slug($title).'_'.Carbon::now()->timestamp.'_'.Str::random(40),
            'hint'                      => $this->faker->text(300),
            'enrolled'                  => $this->faker->numberBetween(1, 30000),
            'language'                  => rand(0, 1) ? 'English' : 'French',
            'subtitle_status'           => $this->faker->boolean(),
            'money_back_guarantee'      => $this->faker->numberBetween(1, 30).'-Day Money-Back Guarantee',
            'seen'                      => $this->faker->numberBetween(0, 200000),
            'like'                      => $this->faker->numberBetween(0, 200000),
            'dislike'                   => $this->faker->numberBetween(0, 200000),
            'cover_image'              => $cover_images[$cover_images_key],
            'requirement'               => 'Use another table for it',
            'description'               => $this->faker->text(3000),
        ];
    }
}
