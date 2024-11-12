@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Gebruikers met toegang</h1>
    <p>
        @foreach($getUsers as $toegang)
            <p>
            {{$toegang->voornaam}}
            {{$toegang->tussenvoegsel}}
            {{$toegang->achternaam}}
            {{$toegang->email}}
            {{$toegang->telefoonnummer}}
            {{$toegang->adres}}
            {{$toegang->postcode}}
            {{$toegang->woonplaats}}
            {{$toegang->land}}
            </p>
        @endforeach
    </p>
    <p>
        @foreach($getAfspraken as $afspraak)
            <p>
                {{$afspraak->onderwerp_afspraak}}
                {{$afspraak->datum_afspraak}}
                {{$afspraak->tijd_afspraak}}
                {{$afspraak->consult}}
            </p>
        @endforeach
    </p>
</div>
@endsection