<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link rel="stylesheet" href="{{ asset('assets/css') }}/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css') }}/style.css">
    <link rel="icon" href="{{ asset('assets/image') }}/logo.png" type="image/x-icon">
    <script src="{{ asset('assets/js') }}/jquery.js"></script>
    <title>@yield('title') | Paguyuban</title>
    @stack('style')
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-success" id="sidebar-wrapper">
            <div class="sidebar-heading" style="overflow:hidden"><img src="{{ asset('assets/image') }}/logoCircle.png" alt="" width="50" height="50">
                <span class="text-white"><strong>Paguyuban</strong></span>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-success text-white">Beranda</a>
                <a href="{{ url('/tagihan') }}" class="list-group-item list-group-item-action bg-success text-white">Laporan Keuangan</a>
                <a href="#" class="list-group-item list-group-item-action bg-success text-white">Keanggotaan</a>
                <a href="{{ route('struktur.anggota') }}" class="list-group-item list-group-item-action bg-success text-white">Struktur Organisasi</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <button class="btn btn-outline-light" id="menu-toggle">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="particle"></div>
            <div class="py-4">
                @yield('content')
            </div>
            @include('layouts._modal')
            @include('layouts.footer')
        </div>            
    </div>
    <script src="{{ asset('assets/js') }}/popper.js"></script>
    <script src="{{ asset('assets/js') }}/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.js"></script>
    <script src="{{ asset('assets/js') }}/particles.js"></script>
    <script src="{{ asset('assets/js') }}/app.js" type="text/javascript"></script>
    @stack('script')
</body>
</html>