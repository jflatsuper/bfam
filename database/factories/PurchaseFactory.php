<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'status'    => rand(0, 1) ? 'Completed' : 'Pending' ,
            'user_id'   => User::inRandomOrder()->first()->id,
        ];
    }
}
