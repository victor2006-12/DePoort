@extends('layouts.app')

<!-- resources/views/includes/admin-css.blade.php -->
<link href="{{ asset('css/admin.css') }}" rel="stylesheet" />

@section('content')

<div class="container">
    <h2><b>Toegang aanvragen</b></h2>

    <!-- Form Section -->
    @foreach($getUser as $user)
        <div>
            <p>Toegang vragen voor: {{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</p>
            <form method="POST" action="{{ route('admin.medlingAanvragen') }}">
                @csrf
                <input type="hidden" name="gebruikers_id" value="{{ $user->id }}">
                <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                <label for="dokter"><b>Kies dokter:</b></label>
                <select name="dokter" id="dokter">
                    @foreach($getDokters as $dokter)
                        <option value="{{ $dokter->id }}">
                            {{ $dokter->voornaam }} {{ $dokter->tussenvoegsel }} {{ $dokter->achternaam }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn-primary">Toegang vragen</button>
            </form>
        </div>
    @endforeach

    <!-- Users with Access Section -->
    <div style="margin-top: 30px; width: 100%;">
        <h3><b>Gebruikers met toegang</b></h3>
        <table class="access-table">
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getUsers as $toegang)
                    <tr>
                        <td>
                            <a href="{{ route('admin.toegangGebruikers') }}">
                                {{ $toegang->voornaam }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.toegangGebruikers') }}">
                                {{ $toegang->tussenvoegsel }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.toegangGebruikers') }}">
                                {{ $toegang->achternaam }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection