<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bolsa de Empleo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Bolsa de Empleo
                </a>
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
                                    <a class="nav-link" href="{{ route('login') }}">Inicio de Sesión</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre . " " . Auth::user()->apellido }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    {{-- Crear Perfil --}}
                                    @php
                                        $perfil = App\Models\Perfil::where('users_id', Auth::user()->id)->first();
                                        if ($perfil == null) {
                                            echo '<a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById(\'create-perfil-form\').submit();"
                                            >Crear Perfil</a>';
                                        } else {
                                            echo '<a class="dropdown-item" href="
                                            '. route('perfil.view') .'"
                                            ">Ver mi Perfil</a>';
                                        }                            
                                    @endphp

                                    {{-- Crear Empresa --}}
                                    @php
                                        $empresa = App\Models\Empresa::where('users_id', Auth::user()->id)->first();
                                        if ($empresa == null) {
                                            echo '<a class="dropdown-item" href="
                                            '. route('empresa.create') .'"
                                            ">Crear perfil Empresa</a>';
                                        } else {
                                            echo '<a class="dropdown-item" href="
                                            '. route('empresa.index') .'"
                                            ">Ver mi Empresa</a>';
                                        }
                                    @endphp

                                    <form id="create-perfil-form" action="{{ route('perfil.create') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('skills.index') }}">
                                        Skills
                                    </a>

                                    <a class="dropdown-item" href="{{ route('roles.index') }}">
                                        Roles
                                    </a>
                                        
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('js')
</body>
</html>
