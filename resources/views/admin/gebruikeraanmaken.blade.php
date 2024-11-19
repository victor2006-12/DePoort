@extends('layout')

@section('content')
<div>
    <h1>Gebruikers aanmaken</h1>
    <form action="{{ route('admin.gebruikeraanmakenPOST') }}" method="POST" autocomplete="off">
        @csrf   
        

        <div class="mb-3">  
            <label for="voornaam" class="form-label">Voornaam</label>
            <input type="text" class="form-control" id="voornaam" name="voornaam" required>
        </div>
        <div class="mb-3">
            <label for="tussenvoegsel" class="form-label">Tussenvoegsel</label>
            <input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel">
        </div>
        <div class="mb-3">
            <label for="achternaam" class="form-label">Achternaam</label>
            <input type="text" class="form-control" id="achternaam" name="achternaam" required>
        </div>
        <div class="mb-3">
            <label for="adres" class="form-label">Adres</label>
            <input type="text" class="form-control" id="adres" name="adres" required>
        </div>
        <div class="mb-3">
            <label for="postcode" class="form-label">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" required>
        </div>
        <div class="mb-3">
            <label for="woonplaats" class="form-label">Woonplaats</label>
            <input type="text" class="form-control" id="woonplaats" name="woonplaats" required>
        </div>
        <div class="mb-3">
            <label for="land" class="form-label">Land</label>
            <input type="text" class="form-control" id="land" name="land" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Aanmaken</button>
    </form>
</div>
@endsection
