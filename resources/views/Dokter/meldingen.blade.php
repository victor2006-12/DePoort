@extends('layout')

@section('title', 'Meldingen')

@section('content')

<!-- moet ermin nog stylen -->
<div style="display: flex; flex-direction: column; align-items: center; margin-top: 5vh">
    <!--
    @foreach($meldingen as $melding)
        <p>{{$melding->verzoek_toegang}}</p>
        <p>{{$melding->afspraak_toegang}}</p>        
    @endforeach
    -->
  
    @foreach($toegangGegevens as $toegang)
    <p>Admin {{ $toegang->admin->voornaam }} 
        {{ $toegang->admin->tussenvoegsel }}
        {{ $toegang->admin->achternaam }}
        wilt toegang tot cliënt
        {{ $toegang->client->voornaam }}
        {{ $toegang->client->achternaam}}</p>
    @endforeach
    <div>
        <form method="POST" >
            <input type="submit" value="Toestaan">
        </form>
        <form method="POST">
            <input type="submit" value="Weigeren">
        </form>        
    <div>
</div>

@endsection