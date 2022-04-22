<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'address' => $this->faker->address(),
            'gender' => 'male', 
            'dob' => $this->faker->DateTime(),
            'experience' => $title = $this->faker->text(),
            'bio' => $this->faker->paragraph(rand(2, 3)),
            'cover_letter' => $this->faker->paragraph(rand(2, 3)),
            'resume' => 'cover/com.jpg',
            'avatar' => 'avatar/img_avatar.png',
    
        ];
    }
}
