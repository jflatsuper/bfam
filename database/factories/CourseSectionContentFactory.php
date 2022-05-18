<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseSection;
use App\Models\CourseSectionContent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseSectionContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseSectionContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lessonsPath = array('01.mp4', '02.mp4', '03.mp4', '04.mp4');
        $key = array_rand($lessonsPath);

        return [
            'course_id'             => Course::inRandomOrder()->first()->id,
            'course_section_id'     => CourseSection::inRandomOrder()->first()->id,
            'title'                 => $title = $this->faker->text(100),
            'slug'                  => Str::slug($title).'_'.Carbon::now()->timestamp.'_'.Str::random(40),
            'position'              => CourseSectionContent::max('id') + 1,
            'description'           => $this->faker->text(500),
            'location'              => $lessonsPath[$key]
        ];
    }
}
