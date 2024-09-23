@extends('layout')

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
                        <a class="nav-link" href="contact#">Contact & Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@endsection
