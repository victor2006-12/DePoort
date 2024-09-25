@extends('layout')

@section('styles')
<style>
    /* Zorgt ervoor dat de pagina de volledige hoogte heeft en de footer onderaan blijft */
    html, body {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    /* Zorgt ervoor dat de content de resterende ruimte vult */
    .content {
        flex: 1;
    }

    /* Footer styling */
    footer {
        background-color: #343a40;
        color: white;
        padding: 20px 0;
        width: 100%;
    }

    footer .social-icons a {
        color: white;
        margin: 0 10px;
    }
</style>
@endsection

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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Afspraak#">Afspraak maken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Overons#">Over ons</a>
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

<div class="container mt-4 card-container">
    <div class="row">

        <!-- Eerste Card -->
        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('image/healthcare.jpg') }}" class="img-fluid rounded-start" alt="Healthcare Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Wist je dat?</h5>
                            <p class="card-text">
                                Het is aangeraden om dagelijks ten minste 30 minuten matige fysieke activiteit te doen, zoals wandelen of fietsen, om hart- en vaatziekten te voorkomen.
                            </p>
                            <p class="card-text"><small class="text-body-secondary">Laatste update: 1 uur geleden</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tweede Card -->
        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('image/healthy-food.jpg') }}" class="img-fluid rounded-start" alt="Healthy Food">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Gezonde voeding</h5>
                            <p class="card-text">
                                Een gebalanceerd dieet met voldoende fruit, groenten en vezels kan de kans op chronische ziekten aanzienlijk verlagen.
                            </p>
                            <p class="card-text"><small class="text-body-secondary">Laatste update: 2 uur geleden</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Voeg hier meer kaarten toe, zoals in het eerste voorbeeld -->

    </div>
</div>

@endsection
