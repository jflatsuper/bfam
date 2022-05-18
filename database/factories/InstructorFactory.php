<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instructor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $qualifications = array('B-TECH', 'B-SC', 'B-AED', 'PHD', 'MSC', 'M-A', 'PROF', 'SECONDARY', 'PRIMARY', 'NONE');
        $qual_key       = array_rand($qualifications);

        return [
            'user_id'      => User::inRandomOrder()->first()->id,
            'biography'    => $this->faker->paragraphs(4, true),
            'qualification' => $qualifications[$qual_key],
            'phone'         => $this->faker->phoneNumber,
            'twitter'       => 'nothing@twitter.com',
            'linkedin'      => 'nothing@linkedin.com',
            'facebook'      => 'nothing@facebook.com',
            'instagram'     => 'nothing@instagram.com',
            'github'        => 'nothing@github.com',
            'gender'        => rand(0, 1) ? 'Male' : 'Female',
            'address'       => $this->faker->address,
            'city'          => $this->faker->city,
            'state'         => $this->faker->state,
            'country'       => $this->faker->country,
            'language'      => rand(0, 1) ? 'English' : 'French',
            'age'           => $this->faker->numberBetween(13, 100),
            'status'        => rand(0, 1) ? 'Activated' : 'Pending'
        ];
    }
}
