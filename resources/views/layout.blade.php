<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

@yield('content')

<!-- Footer Section -->
<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row align-items-center">
            <!-- Logo and Name -->
            <div class="col-md-6 d-flex align-items-center mb-3 mb-md-0">
                <img src="{{ asset('image/logopancake1.jpg') }}" alt="DePoort Logo" class="me-3" style="width: 50px;">
                <span style="font-size: 24px;">DePoort</span>
            </div>
            <!-- Social Media Links -->
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-white me-3">
                    <i class="bi bi-facebook"></i> Facebook
                </a>
                <a href="#" class="text-white me-3">
                    <i class="bi bi-twitter"></i> Twitter
                </a>
                <a href="#" class="text-white">
                    <i class="bi bi-instagram"></i> Instagram
                </a>
            </div>
        </div>
        <div class="text-center pt-3">
            <p class="mb-0">© 2024 DePoort. Alle rechten voorbehouden.</p>
        </div>
    </div>
</footer>

@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
