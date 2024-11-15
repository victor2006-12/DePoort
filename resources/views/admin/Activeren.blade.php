@extends('layout')

@section('content')

@foreach($users as $user)
    <p>
        {{$user->voornaam}}
        {{$user->tussenvoegsel}}
        {{$user->achternaam}}          
        <form action="{{  route('admin.activerenPOST', $user->id) }}" method="POST">
            @csrf
            <input type="submit" value="Activeren">
        </form>
    </p>
@endforeach

@endsection