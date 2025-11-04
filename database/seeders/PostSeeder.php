<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default user if none exists
        $user = User::firstOrCreate(
            ['email' => 'rifky@example.com'],
            [
                'name' => 'Rifky',
                'password' => bcrypt('password'),
            ]
        );

        // Create blog posts
        $posts = [
            [
                'title' => 'Building My First Laravel Blog',
                'slug' => 'building-my-first-laravel-blog',
                'excerpt' => 'A journey into creating a simple blog system with Laravel, SQLite, and Blade templates.',
                'content' => '<div class="space-y-6">
    <p class="text-lg">Today I started building my first blog using Laravel. It\'s been an interesting journey setting up the database, models, and views.</p>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">Why Laravel?</h2>
    <p>I chose Laravel because of its elegant syntax and powerful features. The Eloquent ORM makes database interactions incredibly simple, and Blade templates are intuitive to work with.</p>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">The Setup</h2>
    <p>I\'m using SQLite for the database, which is perfect for development and small projects. No need for complex database server configurations - just a single file that stores everything.</p>
    
    <h3 class="text-xl font-semibold mt-6 mb-3">Key Features</h3>
    <ul class="list-disc list-inside space-y-2 ml-4">
        <li>User authentication and post ownership</li>
        <li>Clean URL slugs for SEO</li>
        <li>Published/draft status for posts</li>
        <li>Timestamps for tracking when posts were created</li>
    </ul>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">What I Learned</h2>
    <p>Setting up relationships between Users and Posts was surprisingly easy. Laravel\'s conventions make everything just work. The migration system is also fantastic - version control for your database schema!</p>
    
    <div class="bg-gray-800 rounded-lg p-4 my-6">
        <code class="text-sm text-green-400">
            php artisan make:model Post -m<br>
            php artisan migrate
        </code>
    </div>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">Next Steps</h2>
    <p>I\'m planning to add more features like categories, tags, and maybe even a simple admin panel. For now, I\'m happy with this basic setup that actually works!</p>
    
    <p class="text-muted mt-8">This is just the beginning of my Laravel journey. Stay tuned for more posts about web development and coding adventures.</p>
</div>',
                'featured_image' => null,
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'My Portfolio Projects: RuangKerja & CS2 Skin Rating',
                'slug' => 'my-portfolio-projects-ruangkerja-cs2-skin-rating',
                'excerpt' => 'An overview of my two main projects: a full-stack employment platform and a desktop application for rating CS2 weapon skins.',
                'content' => '<div class="space-y-6">
    <p class="text-lg">I\'m excited to share two major projects I\'ve been working on recently. Each project showcases different aspects of software development, from web applications to desktop GUI programming.</p>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">🚀 RuangKerja - Employment Platform</h2>
    <p>RuangKerja is an innovative employment platform designed to tackle unemployment challenges in Indonesia through digital solutions. This full-stack web application combines modern technologies with intelligent features to connect job seekers with opportunities.</p>
    
    <h3 class="text-xl font-semibold mt-6 mb-3">Key Features:</h3>
    <ul class="list-disc list-inside space-y-2 ml-4">
        <li><strong>Interactive Job Matching System</strong> - Smart algorithms match candidates with relevant positions</li>
        <li><strong>AI-Powered Career Guidance Chatbot</strong> - Provides personalized career advice and answers</li>
        <li><strong>Comprehensive User Dashboards</strong> - Intuitive interfaces for both job seekers and employers</li>
        <li><strong>Real-time Notifications</strong> - Stay updated on applications and new opportunities</li>
    </ul>
    
    <h3 class="text-xl font-semibold mt-6 mb-3">Technology Stack:</h3>
    <div class="flex flex-wrap gap-2 my-4">
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">SpringBoot</span>
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">HTML</span>
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">CSS</span>
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">JavaScript</span>
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">MySQL</span>
    </div>
    
    <p>Building RuangKerja taught me valuable lessons about full-stack development, database design, and creating user-centric applications. The integration of an AI chatbot was particularly challenging but rewarding.</p>
    
    <div class="my-6 p-4 bg-blue-900/20 border border-blue-500/30 rounded-lg">
        <p class="text-blue-300"><strong>🔗 Check it out:</strong> <a href="https://github.com/rifk7s/ruangkerja" class="underline hover:text-blue-400">GitHub Repository</a> | <a href="https://idkwhat77.github.io/Frontend-ALP-Kelompok1/" class="underline hover:text-blue-400">Live Demo</a></p>
    </div>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">🎮 CS2 Skin Rating GUI</h2>
    <p>This is a Java Swing desktop application designed for displaying and rating Counter-Strike 2 weapon skins. It\'s a perfect showcase of Object-Oriented Programming principles in action.</p>
    
    <h3 class="text-xl font-semibold mt-6 mb-3">Technical Highlights:</h3>
    <ul class="list-disc list-inside space-y-2 ml-4">
        <li><strong>Dark-themed User Interface</strong> - Sleek and modern design using Java Swing</li>
        <li><strong>Comprehensive OOP Implementation</strong> - Demonstrates inheritance, encapsulation, abstraction, and polymorphism</li>
        <li><strong>Modular Component Architecture</strong> - Clean, maintainable code structure</li>
        <li><strong>Interactive Rating System</strong> - Rate and compare different weapon skins</li>
    </ul>
    
    <h3 class="text-xl font-semibold mt-6 mb-3">Technology Stack:</h3>
    <div class="flex flex-wrap gap-2 my-4">
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">Java</span>
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">Swing</span>
        <span class="inline-block px-3 py-1 text-sm rounded bg-gray-800 text-gray-300">NetBeans</span>
    </div>
    
    <p>This project was an excellent opportunity to deepen my understanding of desktop application development and GUI programming. Working with Swing components and implementing OOP principles throughout the application structure was both educational and fun.</p>
    
    <div class="my-6 p-4 bg-blue-900/20 border border-blue-500/30 rounded-lg">
        <p class="text-blue-300"><strong>🔗 Source Code:</strong> <a href="https://github.com/rifk7s/SwingGUI" class="underline hover:text-blue-400">GitHub Repository</a></p>
    </div>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">💭 Reflections</h2>
    <p>Working on these two projects simultaneously gave me a well-rounded perspective on software development. From building scalable web applications with SpringBoot to crafting responsive desktop interfaces with Java Swing, each project presented unique challenges and learning opportunities.</p>
    
    <p>RuangKerja pushed me to think about real-world problems and how technology can provide solutions, while the CS2 Skin Rating GUI helped me master fundamental programming concepts and desktop UI/UX design.</p>
    
    <h2 class="text-2xl font-bold mt-8 mb-4">🎯 What\'s Next?</h2>
    <p>I\'m currently exploring more advanced features for both projects. For RuangKerja, I\'m considering adding video interview capabilities and skill assessments. For the CS2 project, I\'m planning to implement data persistence and possibly a recommendation system.</p>
    
    <p class="text-muted mt-8">Want to see more of my work? Check out my <a href="/projects" class="text-blue-400 hover:underline">projects page</a> for a complete portfolio!</p>
</div>',
                'featured_image' => null,
                'status' => 'published',
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($posts as $postData) {
            Post::create(array_merge($postData, ['user_id' => $user->id]));
        }
    }
}
