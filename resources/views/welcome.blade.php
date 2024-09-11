<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to BTeachers</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">BTeachers</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/teacher/home') }}" class="nav-link  text-danger fs-5 fw-bold">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link  text-danger fs-5 fw-bold">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link  text-danger fs-5 fw-bold">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-grow-1">
    <!-- Hero Section -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-6 fw-bold">Welcome to BTeachers</h1>
            <p class="lead">Join a growing community of teachers. Register now to create your profile, receive reviews, and manage your classes!</p>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/teacher/home') }}" class="btn btn-warning btn-sm">Get Started</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Get Started</a>
                    @endauth

            @endif
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="h5">What can you expect?</h2>
            <p class="small">After registration, you can create a detailed profile, interact with students, receive reviews, and much more!</p>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-2">
    <div class="container">
        <p class="mb-1">&copy; 2024 BTeachers. All rights reserved.</p>
        <p class="mb-0 small">Have questions? <a href="#" class="text-warning text-decoration-none">Contact us</a></p>
    </div>
</footer>

</body>
</html>
