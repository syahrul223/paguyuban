@extends('layouts.header')

@section('title')
    Struktur Anggota
@endsection

@push('style')
    <style>
        html{
            overflow:hidden;
        }
        body{
            background: rgb(155, 254, 113);
        }
        .structure{
            background: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 500px)
        {
            .display-4{
                font-size: 32px;
            }
        }
        #particle {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #88fb00;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-4 text-center">Struktur Keanggotaan</h1>
            </div>
            <div class="col-8 structure" style="border-radius:5px;">
                <img src="{{ asset('assets/image') }}/Struktur Paguyuban.svg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        particlesJS('particle', {
    "particles": {
    "number": {
        "value": 25,
        "density": {
        "enable": true,
        "value_area": 700
        }
    },
    "color": {
        "value": "#ffffff"
    },
    "shape": {
        "type": "edge",
        "stroke": {
        "width": 0,
        "color": "#000000"
        },
        "polygon": {
        "nb_sides": 5
        },
    },
    "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
        }
    },
    "size": {
        "value": 20,
        "random": true,
        "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
        }
    },
    "line_linked": {
        "enable": false,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
    },
    "move": {
        "enable": true,
        "speed": 3,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
        }
    }
    },
    "interactivity": {
    "detect_on": "canvas",
    "events": {
        "onhover": {
        "enable": false,
        "mode": "grab"
        },
        "onclick": {
        "enable": false,
        "mode": "push"
        },
        "resize": true
    },
    "modes": {
        "grab": {
        "distance": 140,
        "line_linked": {
            "opacity": 1
        }
        },
        "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
        },
        "repulse": {
        "distance": 200,
        "duration": 0.4
        },
        "push": {
        "particles_nb": 4
        },
        "remove": {
        "particles_nb": 2
        }
    }
    },
});
    </script>
@endpush