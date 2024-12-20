<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
    class CategoryFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        
        public function definition(): array
        {
        $categories = ['Technology', 'Lifestyle', 'Entertainment', 'Education'];
            return [
                "name" => $categories[$this->faker->unique()->numberBetween(0, 3)]
            ];
        }
    }
