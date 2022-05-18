<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseSection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'   => Course::inRandomOrder()->first()->id,
            'title'       => $title = $this->faker->text(100),
            'slug'        => Str::slug($title).'_'.Carbon::now()->timestamp.'_'.Str::random(40),
            'position'    => CourseSection::max('id') + 1,
            'description' => $this->faker->text(50)
        ];
    }
}
