@extends('layout')

@section('title', 'Cliënt bewerken')

@section('content')

<div>
    <h1>Bewerk gegevens van {{ $getUser->voornaam }} {{ $getUser->achternaam }} </h1>
    <form action="/dokter/update/{{ $getUser->id }}" method="post">
        @csrf
        <label for="voornaam">Voornaam</label>
        <input type="text" name="voornaam" id="voornaam" value="{{ $getUser->voornaam }}" required>

        <label for="tussenvoegsel">Tussenvoegsel</label>
        <input type="text" name="tussenvoegsel" id="tussenvoegsel" value="{{ $getUser->tussenvoegsel }}">

        <label for="achternaam">Achternaam</label>
        <input type="text" name="achternaam" id="achternaam" value="{{ $getUser->achternaam }}" required>

        <label for="adres">Adres</label>
        <input type="text" name="adres" id="adres" value="{{ $getUser->adres }}" required>

        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode" value="{{ $getUser->postcode }}" required>

        <label for="woonplaats">Woonplaats</label">
        <input type="text" name="woonplaats" id="woonplaats" value="{{ $getUser->woonplaats }}" required> 

        <label for="land">Land</label>
        <input type="text" name="land" id="land" value="{{ $getUser->land }}" required>

        <input type="submit" value="Bewerken">
    </form>
</div>

@endsection