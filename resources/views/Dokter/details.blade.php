@extends('layout')

@section('title', 'Cliënt gegevens')

@section('content')

<div>
    <div>
        @foreach($userGegevens as $gegevens)
            <h2>{{ $gegevens->voornaam }} 
            @if($gegevens->tussenvoegsel !== null)
                {{ $gegevens->tussenvoegsel }}
            @endif
            {{ $gegevens->achternaam }}</h2>
            <p>{{ $gegevens->email }}</p>
            <strong>Adres</strong>
            <p>{{ $gegevens->adres }}</p>
            <p>{{ $gegevens->postcode }}</p>
            <p>{{ $gegevens->woonplaats }}</p>
            <p>{{ $gegevens->land}}</p>
            <p><a href="../edit/{{ $gegevens->id }}">bewerk</a></p>
        @endforeach
    </div>
    <div>
        <h2>Afspraak gegevens</h2>
    
        <table>
            <tr>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Onderwerp</th>
                <th>Consult</th>
            </tr>
            @foreach($consultGegevens as $afspraak)
                <tr>
                    <td>{{ $afspraak->datum_afspraak }}</td>
                    <td>{{ $afspraak->tijd_afspraak }}</td>
                    <td>{{ $afspraak->onderwerp_afspraak }}</td>
                    <td>{{ $afspraak->consult}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
    
@endsection
