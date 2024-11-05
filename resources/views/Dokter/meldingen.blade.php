@extends('layout')

@section('title', 'Meldingen')

@section('content')

<!-- moet ermin nog stylen -->
<div style="display: flex; flex-direction: column; align-items: center; margin-top: 5vh">

    @if(!$meldingen->isempty())
        @foreach($toegangGegevens as $toegang)
        <p>Admin {{ $toegang->admin->voornaam }} 
            {{ $toegang->admin->tussenvoegsel }}
            {{ $toegang->admin->achternaam }}
            wilt toegang tot cliënt
            {{ $toegang->client->voornaam }}
            {{ $toegang->client->achternaam}}</p>
            <div>
                <form method="POST" action="{{ route('dokter.medlingToestaan', $toegang->toegang_id) }}">
                    @csrf
                    <input type="submit" value="Toestaan">
                </form>
                <form method="POST" action="{{ route('dokter.meldingWeigeren', $toegang->toegang_id) }}">
                    @csrf
                    <input type="submit" value="Weigeren">
                </form>        
            <div>
        @endforeach
    @else
        geen meldingen
    @endif
</div>

@endsection