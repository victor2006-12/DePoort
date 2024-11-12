@extends('layouts.app')

@section('content')
    

<link href="{{ asset('css/admintoegang.css') }}" rel="stylesheet" />

<div class="container">
    <h1><b>Gebruikers met toegang</b></h1>
    
    <!-- Users with Access Section -->
    <div class="user-info">
        <h3>Gebruiker Gegevens</h3>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Tv</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Adres</th>
                    <th>Postcode</th>
                    <th>Woonplaats</th>
                    <th>Land</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getUsers as $toegang)
                    <tr>
                        <td>{{ $toegang->voornaam }}</td>
                        <td>{{ $toegang->tussenvoegsel }}</td>
                        <td>{{ $toegang->achternaam }}</td>
                        <td>{{ $toegang->email }}</td>
                        <td>{{ $toegang->adres }}</td>
                        <td>{{ $toegang->postcode }}</td>
                        <td>{{ $toegang->woonplaats }}</td>
                        <td>{{ $toegang->land }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Appointments Section -->
    <div class="appointments-info" style="margin-top: 30px;">
        <h3>Afspraken</h3>
        <table class="appointments-table">
            <thead>
                <tr>
                    <th>Onderwerp</th>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Consult</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getAfspraken as $afspraak)
                    <tr>
                        <td>{{ $afspraak->onderwerp_afspraak }}</td>
                        <td>{{ $afspraak->datum_afspraak }}</td>
                        <td>{{ $afspraak->tijd_afspraak }}</td>
                        <td>{{ $afspraak->consult }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
