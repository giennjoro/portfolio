<!DOCTYPE html>
<html>

<head>
    <title>Curriculum Vitae - {{ $portfolioName }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* Regular readable font */
            margin: 0;
            padding: 0;
            color: #f8f9fa;
            /* Off-white text for readability */
            line-height: 1.6;
            font-size: 10pt;
            background-color: #1a1a1a;
            /* Deep charcoal background */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #FFD700;
            /* Gold border */
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
            /* Gold shadow */
            background-color: #212529;
            /* Darker charcoal for container */
        }

        h1,
        h2,
        h3 {
            font-family: Arial, sans-serif;
            /* Regular readable font */
            color: #FFD700;
            /* Gold for headings */
            margin-bottom: 10px;
        }

        h1 {
            font-size: 24pt;
            text-align: center;
            background-color: #1a1a1a;
            /* Deep charcoal */
            padding: 10px;
            margin: -20px -20px 20px -20px;
            /* Adjust to fill container width */
        }

        h2 {
            font-size: 16pt;
            border-bottom: 1px solid #FFD700;
            /* Gold border */
            padding-bottom: 5px;
            margin-top: 20px;
        }

        h3 {
            font-size: 12pt;
        }

        .section {
            margin-bottom: 15px;
        }

        .contact-info p {
            margin: 0;
            color: #f8f9fa;
        }

        .profile-pic-cv {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FFD700;
            /* Gold border */
            display: block;
            margin: 0 auto 15px auto;
        }

        .projects-grid {
            display: block;
            /* For PDF, flexbox might not render as expected */
        }

        .project-card {
            border: 1px solid #495057;
            /* Lighter border */
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #343a40;
            /* Darker background for cards */
            color: #f8f9fa;
        }

        .project-card h3 {
            color: #FFD700;
            /* Gold */
            font-size: 11pt;
        }

        .project-card p {
            font-size: 9pt;
            color: #adb5bd;
            /* Light gray */
        }

        .skills-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .skills-list h3 {
            color: #f8f9fa;
            /* White for skill category titles */
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .skills-list li {
            display: inline-block;
            background-color: #ffffff;
            /* White background */
            color: #000000;
            /* Black text */
            padding: 4px 10px;
            /* Increased padding */
            margin: 3px;
            border-radius: 3px;
            font-size: 9pt;
            /* Increased font size */
            font-weight: bold;
            /* Very bold */
            font-family: Verdana, sans-serif;
            /* Different font */
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 8pt;
            color: #adb5bd;
            /* Light gray */
        }

        a {
            color: #FFD700;
            /* Gold links */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $portfolioName }}</h1>

        <img src="{{ public_path('avatar.jpeg') }}" alt="Profile Picture" class="profile-pic-cv">

        <div class="section contact-info">
            <h2>Contact Information</h2>
            @if ($contactEmail)
                <p><strong>Email:</strong> {{ $contactEmail }}</p>
            @endif
            @if ($githubUrl)
                <p><strong>GitHub:</strong> <a href="{{ $githubUrl }}">{{ $githubUrl }}</a></p>
            @endif
            @if ($xUrl)
                <p><strong>X (Twitter):</strong> <a href="{{ $xUrl }}">{{ $xUrl }}</a></p>
            @endif
        </div>

        <div class="section">
            <h2>About Me</h2>
            <p>I’m a seasoned Full-Stack Web Engineer with over 7 years of professional experience specializing in
                Laravel (PHP), JavaScript, and modern DevOps practices. I architect, develop, and deploy scalable web
                applications with a strong focus on performance, security, and maintainability. My core expertise lies
                in backend engineering, RESTful API development, database design, and full lifecycle DevOps workflows —
                from CI/CD pipelines to cloud infrastructure management.</p>
            <p>Over the years, I’ve built and maintained a wide range of platforms, including multi-tenant SaaS systems,
                custom CMS solutions, API-first applications, eCommerce platforms, travel portals, education tools, and
                SMS gateways. I’m deeply familiar with Laravel’s ecosystem — Eloquent ORM, Queues, Events, Sanctum, and
                Livewire </p>
            <p>
                On the infrastructure side, I work hands-on with Linux servers, NGINX/Apache, Docker, and tools like
                Supervisor, Cron, and systemd to ensure reliable background job execution and service uptime. I
                routinely configure secure deployments via Git, set up CI/CD pipelines (using GitHub Actions, Bitbucket
                Pipelines, etc.), and optimize for speed, SEO, and scalability using caching, indexing, and asset
                pipelines.</p>
            <p>

                Security, performance, and clean code are non-negotiable in my work. I write modular, testable code
                (TDD/BDD where applicable), follow SOLID principles, and document my systems well for both technical and
                non-technical stakeholders.

                Above all, I bring a product-minded approach to software development — I don’t just build features, I
                solve real-world problems using code.
            </p>
        </div>

        <div class="section">
            <h2>Projects</h2>
            <div class="projects-grid">
                @foreach ($projects as $project)
                    <div class="project-card">
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>
                        <p><strong>Technologies:</strong> {{ $project->technologies }}</p>
                        @if ($project->url)
                            <p><strong>Link:</strong> <a href="{{ $project->url }}">{{ $project->url }}</a></p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="section skills-list">
            <h2>Skills</h2>
            @foreach ($skills as $category => $categorySkills)
                <h3>{{ $category }}</h3>
                <ul>
                    @foreach ($categorySkills as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ $portfolioName }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
