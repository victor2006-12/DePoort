@extends('layout')

@section('title', 'Cliënt Gegevens')

@section('styles')
    @vite(['resources/css/dokter.css'])
@endsection
@section('content')



<div class="client-details-container">
    <div class="client-details">
        <h2>Cliënt Gegevens</h2>
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Adres</th>
                    <th>Postcode</th>
                    <th>Woonplaats</th>
                    <th>Land</th>
                    <!-- <th>Bewerk</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($userGegevens as $gegevens)
                    <tr>
                        <td>{{ $gegevens->voornaam }} 
                        @if($gegevens->tussenvoegsel !== null)
                            {{ $gegevens->tussenvoegsel }}
                        @endif
                        {{ $gegevens->achternaam }}</td>
                        <td>{{ $gegevens->email }}</td>
                        <td>{{ $gegevens->adres }}</td>
                        <td>{{ $gegevens->postcode }}</td>
                        <td>{{ $gegevens->woonplaats }}</td>
                        <td>{{ $gegevens->land }}</td>
                        <!-- <td><a href="../edit/{{ $gegevens->id }}">bewerk</a></td> -->                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="appointment-details">
        @if(!$consultGegevens == null)
            <h2>Afspraak Gegevens</h2>
            <table>
                <thead>
                    <tr>
                        <th>Datum</th>  
                        <th>Tijd</th>
                        <th>Onderwerp</th>
                        <th>Consult</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultGegevens as $afspraak)
                        <tr>
                            <td>{{ $afspraak->datum_afspraak }}</td>
                            <td>{{ $afspraak->tijd_afspraak }}</td>
                            <td>{{ $afspraak->onderwerp_afspraak }}</td>
                            <td>{{ $afspraak->consult }}</td>
                            <td><a href="../editafspraak/{{ $afspraak->afspraak_id }}">bewerk</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            Geen afspraken
        @endif            
    </div>
</div>

@endsection
