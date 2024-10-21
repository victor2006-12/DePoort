@extends('layout')

@section('title', 'Dokter')

@section('content')

<div>
    <h3>Cliënten</h3>
    <table>
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
        </tr>
        @foreach($getUsers as $user)
        <tr>
            <td>{{ $user->voornaam }} </td>
            @if($user->tussenvoegsel != null)            
                <td>{{ $user->tussenvoegsel }} </td>
            @endif                        
            <td>{{ $user->achternaam }}</td>
            <td><a href="/dokter/details/{{ $user->id }}">Gegevens</a></td>
        </tr>
        @endforeach
    </table>
</div>



@endsection