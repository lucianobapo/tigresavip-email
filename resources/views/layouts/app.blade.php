<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>



        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    {{--<script async defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wysihtml5/0.3.0/wysihtml5.min.js"></script>--}}
    {{--<script async defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wysihtml/0.5.5/wysihtml.js"></script>--}}
    {{--<script async defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wysihtml/0.5.5/wysihtml-toolbar.js"></script>--}}
    {{--<script type="text/javascript" src="assets/js/wysihtml/dist/wysihtml.js"></script>--}}
    {{--<script type="text/javascript" src="assets/js/wysihtml/dist/wysihtml.all-commands.js"></script>--}}
    {{--<script type="text/javascript" src="assets/js/wysihtml/dist/wysihtml.table_editing.js"></script>--}}
    {{--<script type="text/javascript" src="assets/js/wysihtml/dist/wysihtml.toolbar.js"></script>--}}
    {{--<script type="text/javascript" src="assets/js/wysihtml/parser_rules/advanced.js"></script>--}}
    {{--<script type="text/javascript" src="assets/js/wysihtml/parser_rules/advanced_and_extended.js"></script>--}}

    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=9mc8as975j5pnsmf22f0p8xbky5xgnbx7uyj7giew8ykd3ov"></script>--}}
    {{--<script>tinymce.init({ selector:'textarea' });</script>--}}

    <script async defer src="{{ elixir('js/app.js') }}"></script>

    @yield('javascript')
    @yield('stylesheet')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</body>
</html>
