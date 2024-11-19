@extends('layout')

@section('title', 'Afspraak maken')

@section('content')
@section('styles')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">


@endsection



<div class="container mt-5">
    <h2>Afspraak maken</h2>
    <p>Maak hieronder een afspraak door het formulier in te vullen.</p>

    <form action="{{  route('afspraak.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="hidden" class="form-control" id="gebruikers_id" name="gebruikers_id" value="{{ auth()->user()->id }}" required>
        </div>
        <div class="mb-3">
            <select class="form-control" id="dokter_id" name="dokter_id" required>
                <option value="" disabled selected>Kies een dokter</option>
                @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->voornaam }} {{ $dokter->achternaam }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="datum_afspraak" class="form-label">Datum</label>
            <input type="date" class="form-control" id="datum_afspraak" name="datum_afspraak" required>
        </div>
        <div class="mb-3">
            <label for="tijd_afspraak" class="form-label">Tijd</label>
            <input type="time" class="form-control" id="tijd_afspraak" name="tijd_afspraak" required>
        </div>
        <div class="mb-3">
            <label for="onderwerp_afspraak" class="form-label">Onderwerp van de afspraak</label>
            <input type="text" class="form-control" id="onderwerp_afspraak" name="onderwerp_afspraak" required>
        </div>
        <div class="mb-3">
            <label for="consult" class="form-label">Bericht / Consult</label>
            <textarea class="form-control" id="consult" name="consult" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Afspraak maken</button>
    </form>

</div>

@endsection