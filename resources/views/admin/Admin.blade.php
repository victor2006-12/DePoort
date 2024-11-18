<!-- In resources/views/admin/admin.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <!-- Admin Users Table -->
    <h2>Admins</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->voornaam }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Doctor Users Table -->
    <h2>Doctors</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->voornaam }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>
                      <!--  <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">-->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="/admin/meldingen" class="btn btn-primary">Toegang</a>
        <a href="/admin/gebruikeraanmaken" class="btn btn-primary">Gebruiker aanmaken</a>
        <a href="/admin/activeren" class="btn btn-primary">Gebruiker activeren</a>
        <a href="/admin/Deactiveren" class="btn btn-primary">Gebruiker deactiveren</a>
    </div>
</div>
@endsection
