<?php

namespace Database\Factories;

use App\Models\CourseSectionContent;
use App\Models\Subtitle;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubtitleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subtitle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subtitlePaths = array('01.vtt', '02.vtt', '03.vtt');
        $key = array_rand($subtitlePaths);

        return [
            'lesson_id' => CourseSectionContent::inRandomOrder()->first()->id,
            'language'  => rand(0,1) ? 'English' : 'French',
            'location'  => $subtitlePaths[$key]
        ];
    }
}
