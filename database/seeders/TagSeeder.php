<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        // Loop through each category and create tags for it
        foreach ($categories as $category) {
            // Create 5 tags for each category
            Tag::factory()->count(5)->create([
                'category_id' => $category->id,  // Associate the tag with the current category
            ]);
        }
    }
}
