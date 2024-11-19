@php
    $activePage = request()->segment(1);
@endphp

@section(section: 'styles')
<link href='/css/app.css' rel='stylesheet' />
@endsection

<div class="header d-flex justify-content-between align-items-center py-2">
    <div class="logo">
        <a href="#" style="font-size: 24px; color:black; text-decoration:none">
            <img src="{{ asset('image/logopancake1.jpg') }}" alt="Logo" class="me-2" style="width: 50px;">
            <span>DePoort</span>
        </a>
    </div>

    <!-- Client Info Dropdown -->
    <div class="client-info dropdown">
    <a href="#" class="d-flex align-items-center" id="clientDropdown" data-bs-toggle="dropdown"
       aria-expanded="false" style="text-decoration: none; color: black;">
        <img src="{{ asset('image/client-photo.jpg') }}" alt="Client Photo" class="rounded-circle"
             style="width: 40px; height: 40px;">
        <span class="ms-2">{{ $userName ?? 'Client Name' }}</span>
    </a>

        <!-- Dropdown Menu -->
        <ul class="dropdown-menu custom-dropdown-menu" aria-labelledby="clientDropdown">
            <li><a class="dropdown-item" href="{{ url('account/manage') }}">Manage Account</a></li>
            <li><a class="dropdown-item" href="{{ url('logout') }}">Sign Out</a></li>
        </ul>
    </div>
</div>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'home' ? 'active' : '' }}" href="{{ url('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'Afspraak' ? 'active' : '' }}"
                        href="{{ url('Afspraak') }}">Afspraak maken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'Overons' ? 'active' : '' }}" href="{{ url('Overons') }}">Over
                        ons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'Artikelen' ? 'active' : '' }}"
                        href="{{ url('Artikelen') }}">Artikelen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $activePage == 'Contact' ? 'active' : '' }}"
                        href="{{ url('Contact') }}">Contact & info</a>
                </li>
                @if(auth()->user() && auth()->user()->hasRole('admin'))
                <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminpagina') }}">Adminpagina</a>
                        </li>
                    @endif
                @if (Auth::user() && Auth::user()->hasRole('dokter'))
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dokterpagina') }}">DokterPagina</a>
                  </li> 
                
                @endif
                
            </ul>
        </div>
    </div>
</nav>