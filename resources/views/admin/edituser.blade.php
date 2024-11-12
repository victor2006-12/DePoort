@extends('layouts.app')

@section('content')

<div>
    <h1>Bewerk gebruiker</h1>
        <form action="{{ route('admin.updateuser', $user->id) }}" method="POST" style="display: flex; flex-direction: column">
            @csrf
            <input type="text" name="voornaam" value="{{$user->voornaam}}" placeholder="Voornaam" required>
            <input type="text" name="tussenvoegsel" value="{{$user->tussenvoegsel}}" placeholder="Tussenvoegsel" required>
            <input type="text" name="achternaam" value="{{$user->achternaam}}" placeholder="Achternaam" required>
            <input type="text" name="adres" value="{{$user->adres}}" placeholder="Adres" required>
            <input type="text" name="postcode" value="{{$user->postcode}}" placeholder="Postcode" required>
            <input type="text" name="woonplaats" value="{{$user->woonplaats}}" placeholder="Woonplaats" required>
            <input type="text" name="land" value="{{$user->land}}" placeholder="Land" required>
            <input type="email" name="email" value="{{$user->email}}" placeholder="E-mail" required>
            <input type="submit" value="Bewerken">
        </form>
</div>

@endsection