<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseRequirementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseRequirement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $requirements = array(
            'Have a computer with Internet',
            'Be ready to learn an insane amount of awesome stuff',
            'Prepare to build real web apps!'
            );
        $key = array_rand($requirements);

        return [
            'course_id'   => Course::inRandomOrder()->first()->id,
            'requirement' => $requirements[$key],
        ];
    }
}
