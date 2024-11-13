@extends('layout')

@section('content')

<div>
    <h1>Bewerk gebruiker</h1>
    <form action="{{ route('admin.updateuser', $user->id) }}" method="POST" style="display: flex; flex-direction: column">
        @csrf
        <input type="text" name="voornaam" value="{{$user->voornaam}}" placeholder="Voornaam" required>
        <input type="text" name="tussenvoegsel" value="{{$user->tussenvoegsel}}" placeholder="Tussenvoegsel">
        <input type="text" name="achternaam" value="{{$user->achternaam}}" placeholder="Achternaam" required>
        <input type="text" name="adres" value="{{$user->adres}}" placeholder="Adres" required>
        <input type="text" name="postcode" value="{{$user->postcode}}" placeholder="Postcode" required>
        <input type="text" name="woonplaats" value="{{$user->woonplaats}}" placeholder="Woonplaats" required>
        <input type="text" name="land" value="{{$user->land}}" placeholder="Land" required>
        <input type="email" name="email" value="{{$user->email}}" placeholder="E-mail" required>
        <input type="submit" value="Bewerken">
    </form>
    
    <h1>Bewerk afspraak</h1>
    @foreach($afspraken as $afspraak)
        <form action="{{ route('admin.updateAfspraak', $afspraak->afspraak_id) }}" method="POST" style="display: flex; flex-direction: column">
            @csrf                              
            <input type="hidden" name="gebruikers_id" value="{{$afspraak->gebruikers_id}}">
            <input type="hidden" name="dokter_id" value="{{$afspraak->dokter_id}}">
            <input type="date" name="datum_afspraak" value="{{$afspraak->datum_afspraak}}" placeholder="Datum" required>
            <input type="time" name="tijd_afspraak" value="{{$afspraak->tijd_afspraak}}" placeholder="Tijd" required>
            <input type="text" name="onderwerp_afspraak" value="{{$afspraak->onderwerp_afspraak}}" placeholder="Onderwerp" required>
            <input type="text" name="consult" value="{{$afspraak->consult}}" placeholder="Consult" required>
            <input type="submit" value="Bewerken">
        </form>
    @endforeach    
</div>

@endsection