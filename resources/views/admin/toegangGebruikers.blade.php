@extends('layout')

@section('content')
    

<link href="{{ asset('css/admintoegang.css') }}" rel="stylesheet" />

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
                <a href="{{ route('admin.GETedituser', $toegang->id) }}">
                    Bewerken gegevens en afsrpaken
                </a>
            </p>
        @endforeach
    </p>
    <p>
        <h1>Afspraken</h1>
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
