@extends('layout')

@section('title', 'Contact & Info')

@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('image/logopancake1.jpg') }}" alt="Logo" class="me-2">
            <span style="font-size: 24px;">DePoort</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Afspraak#">Afspraak maken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Overons#">Overons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Artikelen#">Artikelen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact#">Contact & Info</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Contact & Info</h2>
    <p>Neem contact met ons op voor vragen of informatie over onze diensten.</p>

    <h3>Onze Locatie</h3>
    <p>Adres: DePoort Medisch Centrum, Stationsplein 10, 1234 AB, Amsterdam</p>
    <p>Telefoon: +31 20 123 4567</p>
    <p>Email: info@depoortmedisch.nl</p>

    <h3>Openingstijden</h3>
    <ul>
        <li>Maandag - Vrijdag: 08:00 - 17:00</li>
        <li>Zaterdag: 09:00 - 14:00</li>
        <li>Zondag: Gesloten</li>
    </ul>
</div>

@endsection

@section('footer')
<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">DePoort Medisch Centrum</h5>
                <p>
                    Stationsplein 10, 1234 AB, Amsterdam<br>
                    Telefoon: +31 20 123 4567<br>
                    Email: info@depoortmedisch.nl
                </p>
            </div>
            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Snelkoppelingen</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="home#" class="text-dark">Home</a></li>
                    <li><a href="Afspraak#" class="text-dark">Afspraak maken</a></li>
                    <li><a href="Overons#" class="text-dark">Over ons</a></li>
                    <li><a href="Contact#" class="text-dark">Contact & Info</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Volg ons</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#" class="text-dark">Facebook</a></li>
                    <li><a href="#" class="text-dark">Instagram</a></li>
                    <li><a href="#" class="text-dark">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3 bg-dark text-white">
        © 2024 DePoort Medisch Centrum. Alle rechten voorbehouden.
    </div>
</footer>
@endsection
