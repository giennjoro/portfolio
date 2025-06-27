# Laravel Portfolio Application Documentation

This document provides a comprehensive guide to setting up, running, and managing your Laravel portfolio application. It also includes information on the code structure to help you make future updates.

## Table of Contents
1.  [Introduction](#introduction)
2.  [System Requirements](#system-requirements)
3.  [Installation Guide](#installation-guide)
    *   [Clone the Repository](#clone-the-repository)
    *   [Install Composer Dependencies](#install-composer-dependencies)
    *   [Environment Configuration](#environment-configuration)
    *   [Database Setup](#database-setup)
    *   [Run Migrations](#run-migrations)
    *   [Install NPM Dependencies & Build Assets](#install-npm-dependencies--build-assets)
    *   [Storage Link](#storage-link)
4.  [Running the Application](#running-the-application)
    *   [Development Server](#development-server)
5.  [Admin Dashboard Usage](#admin-dashboard-usage)
    *   [Accessing the Dashboard](#accessing-the-dashboard)
    *   [Managing Projects](#managing-projects)
    *   [Managing Skills](#managing-skills)
    *   [Viewing Contact Messages](#viewing-contact-messages)
6.  [Code Structure Overview](#code-structure-overview)
    *   [Models](#models)
    *   [Controllers](#controllers)
    *   [Views](#views)
    *   [Routes](#routes)
    *   [Migrations](#migrations)
7.  [Troubleshooting](#troubleshooting)

---

## 1. Introduction

This is a full-stack web developer portfolio application built with Laravel. It features a public-facing portfolio to showcase your projects and skills, and a secure admin dashboard for content management.

## 2. System Requirements

Before you begin, ensure your system meets the following requirements:

*   **PHP:** 7.3 or higher (Laravel 8 requires PHP 7.3+)
*   **Composer:** Latest version
*   **Node.js & NPM:** Latest LTS version
*   **Database:** MySQL (or SQLite for local development, but MySQL is assumed for production)
*   **Web Server:** Nginx or Apache (for production deployment)

## 3. Installation Guide

Follow these steps to get the application up and running on your local machine.

### Clone the Repository

First, clone the project repository to your local machine:

```bash
git clone <repository_url> laravel-portfolio
cd laravel-portfolio
```

### Install Composer Dependencies

Install the backend dependencies using Composer:

```bash
composer install
```

### Environment Configuration

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

Now, open the `.env` file and configure your database connection.

### Database Setup

This application assumes a MySQL database. Update the `.env` file with your database credentials:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Replace `your_database_name`, `your_database_user`, and `your_database_password` with your actual database credentials. Make sure you have created the database (`your_database_name`) in your MySQL server.

### Run Migrations

Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

### Seed the Database (Optional)

To populate your database with dummy project and skill data, run the seeders:

```bash
php artisan db:seed
```

### Install NPM Dependencies & Build Assets

Install the frontend dependencies and compile the assets:

```bash
npm install
npm run dev
```

For production, use `npm run prod`.

### Storage Link

Create a symbolic link for public storage (for project images):

```bash
php artisan storage:link
```

## 4. Running the Application

### Development Server

To run the application locally, use the Laravel development server:

```bash
php artisan serve
```

The application will typically be available at `http://127.0.0.1:8000`.

## 5. Admin Dashboard Usage

### Accessing the Dashboard

To access the admin dashboard, you first need to register a user. You can do this by visiting the `/register` route (e.g., `http://127.0.0.1:8000/register`). After registration, you will be logged in and redirected to the dashboard.

The admin dashboard is located at `/admin/dashboard` (e.g., `http://127.0.0.1:8000/admin/dashboard`).

### Managing Projects

*   **View Projects:** Navigate to the "Projects" link from the admin dashboard.
*   **Add New Project:** Click "Add New Project" to create a new entry. You can add a title, description, technologies used, an image, and a URL.
*   **Edit Project:** Click the "Edit" button next to a project to modify its details.
*   **Delete Project:** Click the "Delete" button next to a project to remove it.

### Managing Skills

*   **View Skills:** Navigate to the "Skills" link from the admin dashboard.
*   **Add New Skill:** Click "Add New Skill" to create a new skill entry. You can add a skill name and categorize it (e.g., "Frontend", "Backend", "Database").
*   **Edit Skill:** Click the "Edit" button next to a skill to modify its details.
*   **Delete Skill:** Click the "Delete" button next to a skill to remove it.

### Viewing Contact Messages

*   **View Contact Messages:** Navigate to the "Contact Messages" link from the admin dashboard.
*   **View Message Details:** Click the "View" button next to a message to see its full content.
*   **Delete Message:** Click the "Delete" button next to a message to remove it.

## 6. Code Structure Overview

This section provides a high-level overview of the key directories and files in the Laravel application.

*   **`app/`**: Contains the core code of your application.
    *   **`app/Models/`**: Eloquent models that represent your database tables.
        *   `Project.php`: Defines the `projects` table structure and relationships.
        *   `Skill.php`: Defines the `skills` table structure and relationships.
        *   `ContactMessage.php`: Defines the `contact_messages` table structure and relationships.
    *   **`app/Http/Controllers/`**: Handles incoming requests and returns responses.
        *   `PortfolioController.php`: Manages the public-facing portfolio pages (homepage, project details, skills, contact form).
        *   `ProjectController.php`: Manages CRUD operations for projects in the admin dashboard.
        *   `SkillController.php`: Manages CRUD operations for skills in the admin dashboard.
        *   `ContactMessageController.php`: Manages viewing and deleting contact messages in the admin dashboard.
*   **`database/`**: Contains your database migrations, seeders, and factories.
    *   **`database/migrations/`**: Files that define your database table schemas.
        *   `xxxx_xx_xx_xxxxxx_create_projects_table.php`: Migration for the `projects` table.
        *   `xxxx_xx_xx_xxxxxx_create_skills_table.php`: Migration for the `skills` table.
        *   `xxxx_xx_xx_xxxxxx_create_contact_messages_table.php`: Migration for the `contact_messages` table.
*   **`resources/`**: Contains your views, language files, and uncompiled assets.
    *   **`resources/views/`**: Blade templates for your application's frontend.
        *   `layouts/app.blade.php`: The main layout file for both public and admin sections.
        *   `portfolio/`: Contains views for the public-facing portfolio.
            *   `index.blade.php`: Homepage displaying featured projects.
            *   `project.blade.php`: Individual project details page.
            *   `skills.blade.php`: Page displaying all skills.
            *   `contact.blade.php`: Contact form page.
        *   `admin/`: Contains views for the admin dashboard.
            *   `projects/`: Views for managing projects (index, create, edit, show).
            *   `skills/`: Views for managing skills (index, create, edit, show).
            *   `messages/`: Views for viewing contact messages (index, show).
        *   `dashboard.blade.php`: The main admin dashboard page.
*   **`routes/`**: Defines all the application's routes.
    *   `web.php`: Contains web routes for both the public portfolio and the admin dashboard.
*   **`public/`**: Contains the publicly accessible files and compiled assets.
*   **`storage/`**: Stores user-generated files (e.g., project images) and application logs.

## 7. Troubleshooting

*   **`could not find driver (SQL: PRAGMA foreign_keys = ON;)`**: This error indicates that the PHP SQLite extension is not installed or enabled. If you intend to use SQLite, ensure `php-sqlite3` is installed and enabled in your `php.ini`. Otherwise, ensure your MySQL database is correctly configured in `.env`.
*   **`Access denied for user 'root'@'localhost'`**: This means your database username or password in the `.env` file is incorrect, or the user does not have sufficient privileges. Verify your MySQL credentials.
*   **`Target class [App\Http\Controllers\PortfolioController] does not exist.`**: This usually means the controller file is missing or the namespace is incorrect. Double-check the file path and the `namespace` declaration in the controller file.
*   **`npm install` or `npm run dev` errors**: Ensure Node.js and NPM are correctly installed. Try clearing the npm cache (`npm cache clean --force`) and reinstalling (`npm install`).
*   **Image Uploads Not Working**: Ensure `php artisan storage:link` has been run and that the `storage/app/public` directory has the correct permissions for your web server to write to it.

If you encounter any other issues, please refer to the official Laravel documentation or seek assistance from the Laravel community.
