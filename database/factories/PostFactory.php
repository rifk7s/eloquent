<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6, true);
        $slugSuffix = $this->faker->unique()->lexify('??????');

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . $slugSuffix),
            'excerpt' => $this->faker->paragraph(),
            'content' => collect($this->faker->paragraphs(mt_rand(4, 8)))
                ->map(fn ($paragraph) => '<p>' . e($paragraph) . '</p>')
                ->implode(PHP_EOL . PHP_EOL),
            'featured_image' => null,
            'user_id' => User::factory(),
            'status' => 'published',
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the post is a draft.
     */
    public function draft(): self
    {
        return $this->state(fn () => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    /**
     * Indicate that the post is scheduled for the future.
     */
    public function scheduled(): self
    {
        return $this->state(fn () => [
            'status' => 'published',
            'published_at' => $this->faker->dateTimeBetween('now', '+1 month'),
        ]);
    }
}
