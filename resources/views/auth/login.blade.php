<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Masuk | Paguyuban</title>
        <link rel="icon" href="{{ asset('assets/image') }}/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css')}}/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <script src="{{ asset('assets/js') }}/jquery.js"></script>
        <style>
            #loginpage {
                background: rgba(0, 0, 0, 0.1) !important;
                margin: 0;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            body{
                background: linear-gradient(to top left, #88fb00, #3ad59f);
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                color: aliceblue;
                height: 100%;
            }
            .btn{
                color: aliceblue !important;
            }
        </style>
    </head>
    <body>
        <main class="py-4">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <h3 class="display-md-4 text-center">Paguyuban Bandung</h3>
                        <hr class="my-4" style="border-color:aliceblue">
                    </div>
                    
                    <div class="col-md-5 shadow pt-4 justify-content-center" id="loginpage">
                        <div class="row justify-content-center">
                            <h3 class="text-center">Masuk</h3>
                        </div>
                        <hr>
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">ID</label>
                                <div class="col-md-7">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-md-5 offset-md-4 mb-2">
                                    <button type="submit" class="btn btn-outline-success btn-block btn-md">
                                        {{ __('Login') }}
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-12 offset-md-4 mb-4">
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-danger btn-md w-3">Daftar</a>
                                    @endif
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-outline-info btn-md" href="{{ route('password.request') }}">
                                            {{ __('Lupa Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="{{ asset('assets/js') }}/popper.js"></script>
        <script src="{{ asset('assets/js') }}/bootstrap.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.js" type="text/javascript"></script>
    </body>
</html>