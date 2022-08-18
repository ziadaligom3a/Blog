<?php

namespace Database\Factories;
use \App\Models\Post;
use \App\Models\category;
use \App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        


            'category_id' => category::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'excerpt' => '<p>' . implode('</p><p>',$this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>',$this->faker->paragraphs(6)) . '</p>',
            'slug' => $this->faker->slug()

      
        ];
    }

}
