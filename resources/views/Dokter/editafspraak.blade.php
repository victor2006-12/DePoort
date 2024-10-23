@extends('layout')

@section('title', 'Afspraak bewerken')

@section('content')
    <div>
        <h1>Bewerk afspraak</h1>
        <form method="post" action="{{ route('dokter.update', $getAfspraak->afspraak_id) }}">
            @csrf
            <label for="datum_afspraak">Datum</label>
            <input type="date" name="datum_afspraak" id="datum_afspraak" value="{{ $getAfspraak->datum_afspraak }}" required>

            <label for="tijd_afspraak">Tijd</label>
            <input type="time" name="tijd_afspraak" id="tijd_afspraak" value="{{ $getAfspraak->tijd_afspraak }}" required>

            <label for="onderwerp_afspraak">Onderwerp van de afspraak</label>
            <input type="text" name="onderwerp_afspraak" id="onderwerp_afspraak" value="{{ $getAfspraak->onderwerp_afspraak }}" required>

            <label for="consult">Bericht / Consult</label>
            <input type="text" name="consult" id="consult" value="{{ $getAfspraak->consult }}" required>

            <input type="submit" value="Bewerken">
    </div>
@endsection