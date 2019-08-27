@extends('layouts.header')

@section('title')
    Home
@endsection

@push('style')
    <style>
        html{
            overflow:hidden;
        }

        .jumbotron{
            background: rgba(255, 255, 255, 0.7);
        }
        
        @media (max-width: 500px){
            html{
                overflow:visible;
            }
            .display-4{
                font-size: 32px !important;
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
            <div class="jumbotron text-center text-md-left">
                <div class="row">
                    <div class="col-md-2 col-sm-12"><img src="{{ asset('assets/image') }}/logo.png" alt="" width="100" height="100"></div>
                    <div class="col-md-10 col-sm-12"><h1 class="display-4">Paguyuban Insan PLN Amanah</h1></div>
                </div>
                <br>
                <p class="lead text-sm-center text-md-left">Aplikasi Paguyuban berbasis Website, dimana website ini menampilkan suatu data keuangan dan struktur anggotanya. </p>
                <hr class="my-4">
                <p>Untuk melihat visi dan misi detailnya bisa langsung unduh file dibawah.</p>
                <a class="btn btn-primary btn-sm " href="{{ route('download.visimisi') }}" role="button">Unduh</a>
              </div>
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
