<!DOCTYPE html>
<html>
    <head>
        <title>The Generics | Store</title>
        <meta name="description" content="This is the description">
        <link rel="manifest" href="/manifest.json">
        {{-- <link rel="manifest" href="{{ asset('manifest.json') }}"> --}}
        <link rel="stylesheet" href="{{ asset('frontend/styles.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontend/bootstrap.min.css') }}" />
        <link rel="icon" type="text/css" href="{{ asset('frontend/Images/icon.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <header class="main-header">
            <nav class="main-nav nav">
                <ul>
                    <li><a href="{{ route('home') }}">HOME</a></li>
                    <li><a href="{{ route('home') }}">STORE</a></li>
                    <li><a href="{{ route('home') }}">ABOUT</a></li>
                    @if (Auth::check())
                    <li><a href="{{ route('logout') }}">LOGOUT</a></li>
                    <li><a href="{{ route('dashboard') }}">ADMIN</a></li>
                    @else
                    <li><a href="{{ route('login') }}">LOGIN</a></li>
                    @endif
                </ul>
            </nav>
            <h1 class="band-name band-name-large">The Generics</h1>
        </header>
        @yield('content')
        <footer class="main-footer">
            <div class="container main-footer-container">
                {{-- <h3 class="band-name">The Generics</h3> --}}
                <div class="footer-logo">
                <img src="{{ asset('frontend/Images/logo-white.png') }}">
                </div>
                <ul class="nav footer-nav" style="display: flex;padding-left:53%;">
                    <li>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="{{ asset('frontend/Images/YouTube Logo.png')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.spotify.com" target="_blank">
                            <img src="{{ asset('frontend/Images/Spotify Logo.png')}}">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="{{ asset('frontend/Images/Facebook Logo.png')}}">
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
        <script src="{{ asset('frontend/store.js') }}" ></script>
        <script>
         @if ($errors->any())
            @foreach ($errors->all() as $key => $singleError)
               toastr.error("{{ $singleError }}")
            @endforeach
         @endif
         @if (session('success'))
            toastr.success("{{ session('success') }}")
         @endif
         @if ('error')
            toastr.error("{{ 'error' }}")
         @endif
         @if (session('error'))
            toastr.error("{{ session('error') }}")
         @endif
       </script>
    </body>
</html>