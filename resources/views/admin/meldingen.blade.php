@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($getUser as $user)
        <div>
            <p>Toegang vragen voor: {{$user->voornaam}} {{$user->tussenvoegsel}} {{$user->achternaam}}</p>
            <form method="POST" action="{{ route('admin.medlingAanvragen') }}">
                @csrf
                <input type="hidden" name="gebruikers_id" value="{{ $user->id }}">
                <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                <label for="dokter">Kies dokter</label>
                <select name="dokter" id="dokter">
                    @foreach($getDokters as $dokter)
                        <option value="{{ $dokter->id }}">
                            {{ $dokter->voornaam }} {{ $dokter->tussenvoegsel }} {{ $dokter->achternaam }}
                        </option>
                    @endforeach
                </select>
                <button type="submit">Toegang vragen</button>
            </form>
        </div>
    @endforeach
</div>
<div>
    <h3>Gebruikers met toegang</h3>
    @foreach($getUsers as $toegang)
        <a href="{{ route('admin.toegangGebruikers', $toegang->id)}}">
            {{$toegang->voornaam}}
            {{$toegang->tussenvoegsel}}
            {{$toegang->achternaam}}
        </a>
    @endforeach
</div>

@endsection