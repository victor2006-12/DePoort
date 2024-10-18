@extends('layout')

@section('title', 'Cliënt gegevens')

@section('content')

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
    <p><a href="../edit/{{ $gegevens->gebruikers_id }}">bewerk</a></p>
@endforeach
@endsection
