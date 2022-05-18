<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseReview;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class   CourseReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'   => Course::inRandomOrder()->first()->id,
            'review'      => $this->faker->text(500),
            'student_id'  => Student::inRandomOrder()->first()->id
        ];
    }
}
