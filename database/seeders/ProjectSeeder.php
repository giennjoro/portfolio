<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'title' => 'E-commerce Platform',
            'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js, including product management, shopping cart, and payment gateway integration.',
            'technologies' => 'Laravel, Vue.js, MySQL, Stripe',
            'image' => 'projects/placeholder_ecommerce.jpg',
            'url' => 'https://github.com/your-username/ecommerce-platform',
        ]);

        Project::create([
            'title' => 'Task Management API',
            'description' => 'A RESTful API for managing tasks, built with Laravel and Sanctum for authentication. Includes user authentication and task CRUD operations.',
            'technologies' => 'Laravel, Sanctum, MySQL, PHPUnit',
            'image' => 'projects/placeholder_task_api.jpg',
            'url' => 'https://github.com/your-username/task-management-api',
        ]);

        Project::create([
            'title' => 'Blog Application',
            'description' => 'A simple blog application with a clean interface, allowing users to create, edit, and publish posts. Features a rich text editor and comment section.',
            'technologies' => 'Laravel, Blade, MySQL, Bootstrap',
            'image' => 'projects/placeholder_blog.jpg',
            'url' => 'https://github.com/your-username/blog-app',
        ]);

        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'This very portfolio website, showcasing my skills and projects. Built with Laravel and a custom admin dashboard for easy content management.',
            'technologies' => 'Laravel, Blade, Bootstrap, MySQL',
            'image' => 'projects/placeholder_portfolio.jpg',
            'url' => 'https://github.com/your-username/portfolio-website',
        ]);
    }
}
