<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Ujian Online</title>
    <link rel="icon" href="{{ asset('/img/logo-ujian.png') }}"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
    <script src="https://kit.fontawesome.com/fe6aa2d4ea.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.bootstrap5.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('/css/preloader.css') }}">
</head>
<body>

    <div id="app">

        <div id="loading"></div>
        <script>
            var load = document.getElementById("loading");

            window.addEventListener('load', function(){
             load.style.display = "none";
            });
           </script>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="">
                <ul class="nav nav-pills">
                    <li class="nav-item ">
                        <a class="navbar-brand  nav-link {{ Request::is('/')? "active":"" }}" aria-current="page" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    </li>
                    @auth
                    @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="navbar-brand  nav-link {{ Request::is('home')? "active":"" }}" aria-current="page" href="{{ url('/home') }}">
                            {{ config('Home', 'Home') }}
                        </a>
                    </li>
                      <li class="nav-item">
                        <a class="navbar-brand  nav-link {{ Request::is('categories')? "active":"" }}" aria-current="page" href="{{ url('/categories') }}">
                            {{ config('Categori', 'Categori') }}
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="navbar-brand  nav-link {{ Request::is('posts')? "active":"" }}" aria-current="page" href="{{ url('/posts') }}">
                            {{ config('Posts', 'Posts') }}
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="navbar-brand  nav-link {{ Request::is('ujianSekolah')? "active":"" }}" aria-current="page" href="{{ url('/ujianSekolah') }}">
                            {{ config('UjianSekolah', 'UjianSekolah') }}
                        </a>
                      </li>
                    @endif
                    @if (Auth::user()->role == 'siswa')

                  <a class="navbar-brand nav-link {{ Request::is('home')? "active":"" }}" href="{{ url('/home') }}">
                    {{ config('Home', 'Home') }}
                </a>
                  <a class="navbar-brand nav-link {{ Request::is('ujianSekolah')? "active":"" }}" href="{{ url('/ujianSekolah') }}">
                    {{ config('UjianSekolah', 'UjianSekolah') }}
                </a>
                  @endif
                  @endauth
                </div>



                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <nav class="navbar navbar-expand-lg navbar-light bg-light">


            <div class="container">
              <a href="/"><img class="me-4" src="assets/images/logo-polindra.png"  alt=""width="30" height="24"/></a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 me-4">
                    @auth
                       @if (Auth::user()->role == 'admin')
                       <li class="nav-item">
                           <a class="navbar-brand  nav-link {{ Request::is('home')? "active":"" }}" aria-current="page" href="{{ url('/home') }}">
                               {{ config('Home', 'Home') }}
                           </a>
                       </li>
                         <li class="nav-item">
                           <a class="navbar-brand  nav-link {{ Request::is('categories')? "active":"" }}" aria-current="page" href="{{ url('/categories') }}">
                               {{ config('Categori', 'Categori') }}
                           </a>
                         </li>
                         <li class="nav-item">
                           <a class="navbar-brand  nav-link {{ Request::is('posts')? "active":"" }}" aria-current="page" href="{{ url('/posts') }}">
                               {{ config('Posts', 'Posts') }}
                           </a>
                         </li>
                         <li class="nav-item">
                           <a class="navbar-brand  nav-link {{ Request::is('ujianSekolah')? "active":"" }}" aria-current="page" href="{{ url('/ujianSekolah') }}">
                               {{ config('UjianSekolah', 'UjianSekolah') }}
                           </a>
                         </li>
                       @endif
                       @if (Auth::user()->role == 'siswa')

                     <a class="navbar-brand nav-link {{ Request::is('home')? "active":"" }}" href="{{ url('/home') }}">
                       {{ config('Home', 'Home') }}
                   </a>
                     <a class="navbar-brand nav-link {{ Request::is('ujianSekolah')? "active":"" }}" href="{{ url('/ujianSekolah') }}">
                       {{ config('UjianSekolah', 'UjianSekolah') }}
                   </a>
                     @endif
                     @endauth
                </ul>
                  @auth
                      <a href="{{ url('/home') }}" class="btn btn-dark me-4 shadow">Home</a>
                      @else
                      <a href="{{ route('login') }}" class="col-md-1 btn btn-dark me-4">Log in</a>
                      @if (Route::has('register'))
                      {{-- <a href="{{ route('register') }}" class="btn btn-primary me-4">Register</a> --}}
                      @endif
                  @endauth
                </form>
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <main class="py-4">
            @yield('category')
        </main>

        <main class="py-4">
            @yield('posts')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {

        select: true
    } );
} );
</script>

</html>

