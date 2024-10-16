<!-- resources/views/account/manage.blade.php -->
@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Account Beheren</h2>
    
    <form action="{{ url('account/update') }}" method="POST">
        @csrf
        <!-- Bijvoorbeeld naam bijwerken -->
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <!-- Bijvoorbeeld e-mail bijwerken -->
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">       
        </div>

        <!-- Bijvoorbeeld wachtwoord bijwerken -->
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
