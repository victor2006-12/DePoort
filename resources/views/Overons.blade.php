@extends('layout')

@section('title', 'Overons')

@section('content')

<style>
    html,
    body {
        height: 100%;
    
        display: flex;
        flex-direction: column;
    }

    .content {
        flex: 1;
    }

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

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 20px;
        /* Increased padding for height */
        background-color: #f8f9fa;
        border-bottom: 1px solid #e0e0e0;
        height: 120px;
        /* Set a fixed height to make it taller */
    }

    .header img {
        height: 50px;
        /* Adjust logo height */
    }

    .client-info {
        display: flex;
        flex-direction: column;
        /* Stack photo and name */
        align-items: center;
    }

    .client-info img {
        width: 60px;
        /* Adjust photo size */
        height: 60px;
        /* Adjust photo size */
        border-radius: 50%;
        /* Make the photo circular */
        margin-bottom: 5px;
        /* Space between name and photo */
    }

    .client-info span {
        font-size: 18px;
        /* Adjust font size for the client name */
    }

    /* Navbar styling */
    .navbar {
        display: flex;
        justify-content: space-between;
        /* Distribute space evenly */
        align-items: center;
        background-color: #f8f9fa;
        padding: 0;
        /* Remove padding to avoid spacing issues */
    }

    .navbar-nav {
        display: flex;
        flex-grow: 1;
        /* Make nav items grow to fill space */
        justify-content: space-around;
        /* Evenly distribute nav items */
        margin: 0;
        /* Remove default margin */
        padding: 0;
        /* Remove default padding */
    }

    .nav-link {
        flex: 1;
        /* Each nav link takes equal space */
        text-align: center;
        /* Center text in each nav link */
    }

    /* Adjust link color and style */
    .nav-link.active {
        font-weight: bold;
        color: #007bff;
        /* Bootstrap primary color for active link */
    }

    .nav-link:hover {
        text-decoration: underline;
        /* Underline on hover */
    }
</style>


<div class="container mt-5">
    <h2>Over ons</h2>
    <p>Welkom bij DePoort, jouw vertrouwde partner in medische zorg. Ons team van toegewijde artsen en specialisten is hier om jou de beste zorg te bieden. We zijn er trots op dat we persoonlijke en professionele zorg kunnen leveren aan al onze patiënten.</p>
    
    <h3>Ons Team</h3>
    <p>Ons team bestaat uit ervaren artsen, verpleegkundigen en specialisten die samenwerken om jouw gezondheid te verbeteren en te behouden. Of je nu komt voor een routinecontrole of een specialistische behandeling, je bent bij ons in goede handen.</p>
    
    <h3>Onze Missie</h3>
    <p>Onze missie is om hoogwaardige, patiëntgerichte zorg te bieden in een vriendelijke en ondersteunende omgeving. We streven ernaar om de nieuwste medische technieken te combineren met een persoonlijke benadering om de gezondheid van onze patiënten te bevorderen.</p>

    <h3>Onze Locatie</h3>
    <p>Ons medisch centrum bevindt zich in het hart van de stad en is gemakkelijk toegankelijk voor patiënten uit de hele regio. We beschikken over moderne faciliteiten en apparatuur om de best mogelijke zorg te garanderen.</p>

    <h3>Waarom kiezen voor DePoort?</h3>
    <ul>
        <li>Ervaren en gekwalificeerd team</li>
        <li>Moderne faciliteiten</li>
        <li>Individuele benadering en zorg op maat</li>
        <li>Uitstekende patiëntenbeoordelingen</li>
    </ul>
</div>

@endsection
