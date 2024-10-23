@extends('layout')

@section('title', 'Contact & Info')
@section('styles')
@vite(['resources/css/admin.css'])
@endsection

@section('content')
<div class="container mt-4">
    <h2>Update Client Information</h2>
    <form action="" method="POST">
        @csrf
        @method('PUT')

        <!-- First Name -->
        <div class="mb-3">
            <label for="first_name" class="form-label">Voornaam</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
        </div>

        <!-- Middle Name -->
        <div class="mb-3">
            <label for="middle_name" class="form-label">Tussenvoegsel</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
        </div>

        <!-- Last Name -->
        <div class="mb-3">
            <label for="last_name" class="form-label">Achternaam</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <!-- Address -->
        <div class="mb-3">
            <label for="address" class="form-label">Adres</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
        </div>

        <!-- Postal Code -->
        <div class="mb-3">
            <label for="postal_code" class="form-label">Postcode</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
        </div>

        <!-- City -->
        <div class="mb-3">
            <label for="city" class="form-label">Woonplaats</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
        </div>

        <!-- Country -->
        <div class="mb-3">
            <label for="country" class="form-label">Land</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="text-muted">Laat leeg als je het wachtwoord niet wilt wijzigen.</small>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>      
@endsection
