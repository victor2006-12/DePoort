@extends('layout')

@section('title', 'Overons')

@section('content')

@php
$activePage = request()->segment(1);
@endphp

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
</nav <div class="container mt-5">
<h2>Over ons</h2>
<p>Welkom bij DePoort, jouw vertrouwde partner in medische zorg. Ons team van toegewijde artsen en specialisten is hier
    om jou de beste zorg te bieden. We zijn er trots op dat we persoonlijke en professionele zorg kunnen leveren aan al
    onze patiënten.</p>

<h3>Ons Team</h3>
<p>Ons team bestaat uit ervaren artsen, verpleegkundigen en specialisten die samenwerken om jouw gezondheid te
    verbeteren en te behouden. Of je nu komt voor een routinecontrole of een specialistische behandeling, je bent bij
    ons in goede handen.</p>

<h3>Onze Missie</h3>
<p>Onze missie is om hoogwaardige, patiëntgerichte zorg te bieden in een vriendelijke en ondersteunende omgeving. We
    streven ernaar om de nieuwste medische technieken te combineren met een persoonlijke benadering om de gezondheid van
    onze patiënten te bevorderen.</p>

<h3>Onze Locatie</h3>
<p>Ons medisch centrum bevindt zich in het hart van de stad en is gemakkelijk toegankelijk voor patiënten uit de hele
    regio. We beschikken over moderne faciliteiten en apparatuur om de best mogelijke zorg te garanderen.</p>

<h3>Waarom kiezen voor DePoort?</h3>
<ul>
    <li>Ervaren en gekwalificeerd team</li>
    <li>Moderne faciliteiten</li>
    <li>Individuele benadering en zorg op maat</li>
    <li>Uitstekende patiëntenbeoordelingen</li>
</ul>
</div>

@endsection