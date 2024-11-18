@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Admin</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="voornaam" value="{{ old('voornaam', $user->voornaam) }}" required>
            </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Update Admin</button>
    </form>
</div>
@endsection
