@extends('layout')

@section('title', 'Meldingen')

@section('content')

<div>
    @foreach($meldingen as $melding)
        <p>{{$melding->verzoek_toegang}}</p>
        <p>{{$melding->afspraak_toegang}}</p>
    @endforeach
</div>

@endsection