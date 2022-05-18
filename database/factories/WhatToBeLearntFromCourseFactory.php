<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\WhatToBeLearntFromCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class WhatToBeLearntFromCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WhatToBeLearntFromCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'    => Course::inRandomOrder()->first()->id,
            'to_be_learnt' => $this->faker->text(100)
        ];
    }
}
