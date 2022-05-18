<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseRating;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseRating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'  => Course::inRandomOrder()->first()->id,
            'rating'     => $this->faker->numberBetween(1, 5),
            'student_id' => Student::inRandomOrder()->first()->id
        ];
    }
}

