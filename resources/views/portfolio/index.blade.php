@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="intro-panel fade-in-up">
            <img src="{{ asset('avatar.jpeg') }}" alt="Your Profile Picture" class="profile-pic scale-in">
            <div class="intro-panel-text">
                <h1>Hello, I'm <span id="typing-name" class="typing-text"></span><span class="cursor">|</span></h1>
                <p>I’m a seasoned Full-Stack Web Engineer with over 7 years of professional experience specializing in
                    Laravel (PHP), JavaScript, and modern DevOps practices. I architect, develop, and deploy scalable web
                    applications with a strong focus on performance, security, and maintainability. My core expertise lies
                    in backend engineering, RESTful API development, database design, and full lifecycle DevOps workflows —
                    from CI/CD pipelines to cloud infrastructure management.</p>
                <p>Over the years, I’ve built and maintained a wide range of platforms, including multi-tenant SaaS systems,
                    custom CMS solutions, API-first applications, eCommerce platforms, travel portals, education tools, and
                    SMS gateways. I’m deeply familiar with Laravel’s ecosystem </p>
                <p>Above all, I bring a product-minded approach to software development — I don’t just build features, I
                    solve real-world problems using code!</p>


                <div class="social-icons mt-4 rotate-in">
                    @if ($githubUrl)
                        <a href="{{ $githubUrl }}" target="_blank" class="text-decoration-none me-3"><i
                                class="fab fa-github fa-2x text-light"></i></a>
                    @endif
                    @if ($xUrl)
                        <a href="{{ $xUrl }}" target="_blank" class="text-decoration-none me-3"><i
                                class="fab fa-twitter fa-2x text-light"></i></a>
                    @endif
                    @if ($contactEmail)
                        <a href="mailto:{{ $contactEmail }}" class="text-decoration-none me-3"><i
                                class="fas fa-envelope fa-2x text-light"></i></a>
                    @endif
                    <a href="{{ route('portfolio.download_cv') }}" class="btn btn-primary mt-3">Download CV</a>
                </div>
            </div>
        </div>

        <h2 class="text-center mb-4 fade-in-up">My Latest Projects</h2>
        <div class="row justify-content-center">
            @foreach ($projects as $project)
                <div class="col-md-4 mb-4 fade-in-up">
                    <div class="card">
                        <img src="{{ Str::startsWith($project->image, 'http') ? $project->image : asset('storage/' . $project->image) }}"
                            class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            <a href="{{ route('portfolio.project', $project) }}" class="btn btn-primary">View Project</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        const nameElement = document.getElementById('typing-name');
        const nameToType = "{{ $portfolioName }}"; // Dynamic name from admin
        let i = 0;
        let isDeleting = false;
        let charIndex = 0;

        function typeWriter() {
            const currentText = nameToType.substring(0, charIndex);
            nameElement.textContent = currentText;

            if (!isDeleting && charIndex < nameToType.length) {
                charIndex++;
                setTimeout(typeWriter, 100); // Typing speed
            } else if (isDeleting && charIndex > 0) {
                charIndex--;
                setTimeout(typeWriter, 50); // Deleting speed
            } else if (!isDeleting && charIndex === nameToType.length) {
                // Done typing, wait a bit then start deleting (optional)
                // setTimeout(() => isDeleting = true, 2000);
                // setTimeout(typeWriter, 50);
            } else if (isDeleting && charIndex === 0) {
                // Done deleting, wait a bit then start typing again (optional)
                // isDeleting = false;
                // setTimeout(typeWriter, 500);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            typeWriter();
        });
    </script>
@endsection
