<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\WhoThisCourseIsFor;
use Illuminate\Database\Eloquent\Factories\Factory;

class WhoThisCourseIsForFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WhoThisCourseIsFor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $texts = array(
            'This course is for anyone who wants to learn about web development, regardless of previous experience',
            'It\'s perfect for complete beginners with zero experience',
            'It\'s also great for anyone who does have some experience in a few of the technologies(like HTML and CSS) but not all',
            'If you want to take ONE COURSE to learn everything you need to know about web development, take this course'
        );
        $key = array_rand($texts);

        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'who_this_course_is_for' => $texts[$key]
        ];
    }
}
