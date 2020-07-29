<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home @if (url()->current() == 'home') <span class="sr-only">(Atual)</span> @endif </a>
                        </li>
                        @canany(['delete_revenda', 'update_revenda', 'list_revenda', 'create_revenda', 'view_revenda'])
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Revendas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @can('list_revenda')<a class="dropdown-item" href="{{ route('admin.revendas.index') }}">Listagem</a>@endcan
                                @can('create_revenda')<a class="dropdown-item" href="{{ route('admin.revendas.create') }}">Novo</a>@endcan
                            </div>
                        </li>
                        @endcan
                        @canany(['delete_cliente', 'update_cliente', 'list_cliente', 'create_cliente', 'list_cliente_proprio', 'update_cliente_proprio', 'delete_cliente_proprio', 'view_cliente_proprio', 'create_cliente_proprio'])
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Clientes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @canany(['list_cliente', 'list_cliente_proprio'])<a class="dropdown-item" href="{{ route('admin.clientes.index') }}">Listagem</a>@endcan
                                @canany(['create_cliente', 'create_cliente_proprio'])<a class="dropdown-item" href="{{ route('admin.clientes.create') }}">Novo</a>@endcan
                            </div>
                        </li>
                        @endcan
                        @canany(['delete_plano', 'update_plano', 'list_plano', 'create_plano'])
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Planos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @can('list_plano')<a class="dropdown-item" href="{{ route('admin.planos.index') }}">Listagem</a>@endcan
                                @can('create_plano')<a class="dropdown-item" href="{{ route('admin.planos.create') }}">Novo</a>@endcan
                            </div>
                        </li>
                        @endcan
                        @canany(['delete_version_software', 'list_version_software', 'create_version_software', 'view_version_software', 'update_version_software', 'list_software', 'create_software', 'view_software', 'update_software', 'delete_software'])
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Software
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @can('list_software')<a class="dropdown-item" href="{{ route('admin.software.index') }}">Listagem</a>@endcan
                                @can('create_software')<a class="dropdown-item" href="{{ route('admin.software.create') }}">Novo</a>@endcan
                            </div>
                        </li>
                        @endcan
                        @canany(['list_software_modulo', 'create_software_modulo', 'view_software_modulo', 'update_software_modulo', 'delete_software_modulo'])
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Modulos
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @can('list_software_modulo')<a class="dropdown-item" href="{{ route('admin.modulos.index') }}">Listagem</a>@endcan
                                    @can('create_software_modulo')<a class="dropdown-item" href="{{ route('admin.modulos.create') }}">Novo</a>@endcan
                                </div>
                            </li>
                        @endcan
                        @canany(['list_software_servico', 'create_software_servico', 'view_software_servico', 'update_software_servico', 'delete_software_servico'])
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Serviços
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @can('list_software_servico')<a class="dropdown-item" href="{{ route('admin.servicos.index') }}">Listagem</a>@endcan
                                    @can('create_software_servico')<a class="dropdown-item" href="{{ route('admin.servicos.create') }}">Novo</a>@endcan
                                </div>
                            </li>
                        @endcan
                    </ul>
                @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.usuarios.index') }}">
                                        Gerenciar Usuarios
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
