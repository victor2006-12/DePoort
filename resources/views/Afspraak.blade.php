@extends('layout')

@section('title', 'Afspraak maken')

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
    <h2>Afspraak maken</h2>
    <p>Maak hieronder een afspraak door het formulier in te vullen.</p>
    
    <form action="/submit-appointment" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Datum</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Tijd</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Afspraak maken</button>
    </form>
</div>

@endsection
