<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(rand(2, 4), true);
        $techStacks = [
            ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS'],
            ['React', 'Node.js', 'MongoDB', 'Express'],
            ['Vue.js', 'TypeScript', 'PostgreSQL', 'Nuxt'],
            ['Next.js', 'React', 'Prisma', 'TypeScript'],
            ['Spring Boot', 'Java', 'MySQL', 'Thymeleaf'],
            ['Django', 'Python', 'SQLite', 'Bootstrap'],
            ['Flutter', 'Dart', 'Firebase', 'Provider'],
            ['React Native', 'JavaScript', 'Redux', 'Expo'],
            ['Angular', 'TypeScript', 'NestJS', 'PostgreSQL'],
            ['Svelte', 'JavaScript', 'Supabase', 'Tailwind'],
        ];

        $projectTypes = [
            'Full-Stack Web Application',
            'Mobile Application',
            'Desktop Application',
            'E-Commerce Platform',
            'API Service',
            'Dashboard Application',
            'Portfolio Website',
            'Blog Platform',
        ];

        return [
            'user_id' => User::factory(),
            'title' => ucwords($title),
            'slug' => \Illuminate\Support\Str::slug($title),
            'type' => fake()->randomElement($projectTypes),
            'description' => fake()->paragraphs(3, true),
            'image' => '/project-images/Placeholder_Image.svg',
            'languages' => fake()->randomElement($techStacks),
            'github_url' => fake()->boolean(80) ? 'https://github.com/rifk7s/' . \Illuminate\Support\Str::slug($title) : null,
            'live_url' => fake()->boolean(60) ? 'https://' . \Illuminate\Support\Str::slug($title) . '.vercel.app' : null,
            'is_featured' => fake()->boolean(30),
            'order' => fake()->numberBetween(0, 100),
        ];
    }
}
