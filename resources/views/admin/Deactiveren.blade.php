@extends('layout')

@section('content')

@foreach($users as $user)
    <p>
        {{$user->voornaam}}
        {{$user->tussenvoegsel}}
        {{$user->achternaam}}          
        <form action="{{  route('admin.deactiverenPOST', $user->id) }}" method="POST">
            @csrf
            <input type="submit" value="Deactiveren">
        </form>
    </p>
@endforeach

@endsection