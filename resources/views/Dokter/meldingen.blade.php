@extends('layout')

@section('title', 'Meldingen')

@section('styles')
@vite(['resources/css/dokter.css'])
@endsection

@section('content')



<!-- moet ermin nog stylen -->
<div class="melding-div">

    @if(!$meldingen->isempty())
        @foreach($toegangGegevens as $toegang)
            <p>
                Admin
                <span class="voornaam-admin">{{ $toegang->admin->voornaam }}</span>
                <span class="tussenvoegsel-admin">{{ $toegang->admin->tussenvoegsel }}</span>
                <span class="achternaam-admin">{{ $toegang->admin->achternaam }}</span>
                wilt toegang tot cliënt
                <span class="voornaam">{{ $toegang->client->voornaam }}</span>
                <span class="achternaam">{{ $toegang->client->achternaam }}</span>
            </p>
            <div class="melding-div-buttons">
                <form method="POST" action="{{ route('dokter.medlingToestaan', $toegang->toegang_id) }}">
                    @csrf
                    <input type="submit" value="Toestaan" class="button-allow">
                </form>
                <form method="POST" action="{{ route('dokter.meldingWeigeren', $toegang->toegang_id) }}">
                    @csrf
                    <input type="submit" value="Weigeren" class="button-deny">
                </form>
                <div>
        @endforeach
    @else
        geen meldingen
    @endif
        </div>

        @endsection