@extends('layouts.app')

@section('content')
<div class="container mb-2">
    <br>
    <div class="column side ">
        <img src="assets/images/login.png"  height="50%" width="100%" alt="">
        </div>
{{-- <div class="row"> --}}
    <div class="column side row ">
        <h3>Hello Again!</h3>
        <p style="color: #555;">Selamat Datang di Aplikasi Website Ujian Online</p>
        <br>

        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>Something went wrong Username and Password</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf


        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
                <input style="width: 100%" id="username" type="text" placeholder="Username"  class="form-control rounded-pill @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>Username Salah</strong>
                    </span>
                @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
                <input id="password" style="width: 100%" type="password" placeholder="Password Min 6 Character..." class="form-control rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>Password Salah</strong>
                    </span>
                @enderror
        </div>


                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="mb-3 d-flex mb-3">
                    <button type="submit" class="btn btn-primary p-2 rounded" style="width: 100%;">
                        {{ __('Login') }}
                    </button>
                </div>
                @if (Route::has('password.request'))
                <a class="btn bg-warning text-white text-decoration-none p-2 rounded" style="width: 100%;" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
        </div>



    {{-- </div> --}}
</div>
@endsection
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;

        background-image: url('assets/images/bg.png');
        background-size: cover;
      }


      /* Create three unequal columns that floats next to each other */
      .column {
        float: left;
        padding: 10px;
      }

      /* Left and right column */
      .column.side {
        width: 45%;
      }

      /* Middle column */
      .column.middle {
        width: 45%;
      }

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      input[type="text"] {
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
      }
      input[type="text"]:focus {
        border: 3px solid #555;
      }

.btn {
  border-radius: 5px;
  width: 38%;
  font-size: 14px;
}

      /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 600px) {
        .column.side,
        .column.middle {
          width: 100%;
        }
      }
    </style>

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <title>CSS Website Layout</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <style>
      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;

        background-image: url('assets/images/bg.png');
        background-size: cover;
      }

      /* Create three unequal columns that floats next to each other */
      .column {
        float: left;
        padding: 10px;
      }

      /* Left and right column */
      .column.side {
        width: 50%;
      }

      /* Middle column */
      .column.middle {
        width: 50%;
      }

      /* Clear floats after the columns */
      .row:after {
        content: "";
        display: table;
        clear: both;
      }
      input[type="text"] {
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
      }
      input[type="text"]:focus {
        border: 3px solid #555;
      }

.btn {
  border-radius: 5px;
  width: 38%;
  font-size: 14px;
}

      /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 600px) {
        .column.side,
        .column.middle {
          width: 100%;
        }
      }
    </style>
  </head>
  <body>
       <div class="container mb-2">
           <br>
      <div class="row">
        <div class="column side">
            <h3>Hello Again!</h3>
            <p style="color: #555;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, expedita! Esse qui</p>

           <br>

           <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                    <input style="width: 80%" id="username" type="username" placeholder="Username"  class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password:</label>
                    <input id="password" style="width: 80%" type="password" placeholder="Password Min 6 Character..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div>


                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="mb-3 d-inline">
                        <button type="submit" class="btn btn-primary p-2">
                            {{ __('Login') }}
                        </button>
                    </div> ||
                    @if (Route::has('password.request'))
                    <a class="btn btn-link bg-warning text-white text-decoration-none p-2" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
        </form>
        </div>
        <div
          class="column side"
        >
        <img src="assets/images/login.png" height="700" width="700" alt="">
    </div>
  </body>
</html>
 --}}
