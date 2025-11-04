<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'rifky@example.com'],
            [
                'name' => 'Rifky',
                'password' => bcrypt('password'),
            ]
        );

        // Create real projects from rifky.dev
        $realProjects = [
            [
                'title' => 'RuangKerja',
                'slug' => 'ruangkerja',
                'user_id' => $user->id,
                'type' => 'Full-Stack Web Application',
                'description' => 'An innovative employment platform designed to tackle unemployment challenges in Indonesia through digital solutions. Features include interactive job matching system, AI-powered career guidance chatbot, comprehensive user dashboards, and real-time notifications. The platform connects job seekers with relevant opportunities using intelligent algorithms and provides personalized career assistance.',
                'image' => '/project-images/ruangkerja.png',
                'languages' => ['SpringBoot', 'HTML', 'CSS', 'JavaScript', 'MySQL'],
                'github_url' => 'https://github.com/rifk7s/ruangkerja',
                'live_url' => 'https://idkwhat77.github.io/Frontend-ALP-Kelompok1/',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'CS2 Skin Rating GUI',
                'slug' => 'swinggui',
                'user_id' => $user->id,
                'type' => 'Desktop Application',
                'description' => 'A Java Swing desktop application designed for displaying and rating CS2 (Counter-Strike 2) weapon skins. Features a dark-themed user interface with comprehensive OOP implementation including inheritance, encapsulation, abstraction, and polymorphism. The application showcases advanced Java GUI development with modular component architecture.',
                'image' => '/project-images/swinggui.png',
                'languages' => ['Java', 'Swing', 'NetBeans'],
                'github_url' => 'https://github.com/rifk7s/SwingGUI',
                'live_url' => null,
                'is_featured' => true,
                'order' => 2,
            ],
        ];

        foreach ($realProjects as $project) {
            Project::create($project);
        }

        // Generate additional 8 dummy projects using factory (total akan jadi 10 projects)
        // Order dimulai dari 3 agar real projects (order 1 & 2) muncul duluan
        Project::factory()->count(8)->create([
            'user_id' => $user->id,
            'is_featured' => false,
            'order' => fn() => rand(3, 100),
        ]);
    }
}
