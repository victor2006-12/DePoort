@extends('layout')

@section('title', 'Dokter')

@section('styles')
    @vite(['resources/css/dokter.css'])
@endsection

@section('content')
<div class="clients-container">
    <h3>Cliënten</h3>
    <table class="clients-table">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getUsers as $user)
            <tr>
                <td>{{ $user->voornaam }}</td>
                <td>
                    @if($user->tussenvoegsel != null)
                        {{ $user->tussenvoegsel }}
                    @endif
                    {{ $user->achternaam }}
                </td>
                <td><a href="/dokter/details/{{ $user->id }}" class="details-link">Gegevens</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
