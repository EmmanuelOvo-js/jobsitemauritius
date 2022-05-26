<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;
use App\Models\Company;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'title' => $title = $this->faker->text(),
            'slug' => str_slug($title),
            'position' => $this->faker->jobTitle(),
            'address' => $this->faker->address(),
            'category_id' => rand(1, 5),
            'type' => 'fulltime',
            'status' => rand(0,1),
            'description' => $this->faker->paragraph(rand(2, 10)),
            'roles' => $this->faker->text(),
            'last_date' => $this->faker->DateTime(),
            'number_of_vacancy'=>rand(1,10),
            'experience'=>rand(1,10),
            'gender'=> $this->faker->randomElement(['male', 'female']),
            'salary'=>rand(10000,50000),
        ];
    }
}
