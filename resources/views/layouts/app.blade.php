<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel WebGL, brain-js, TensorFlow, and ChatGPT</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body>
    <div class="wrapper">
        <div class="container mt-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        Laravel WebGL, brain-js, TensorFlow, and ChatGPT
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" role="tablist" aria-orientation="vertical">
                                <a class="nav-link @yield('nav-home')" href="{{ url('welcome') }}">Home</a>
                                <a class="nav-link @yield('nav-webgl')" href="{{ url('web-gl') }}">WebGL</a>
                                <a class="nav-link @yield('nav-brain-js')" href="{{ url('brain-js') }}">brain-js</a>
                                <a class="nav-link @yield('nav-tensorflow')" href="{{ url('tensor-flow') }}">TensorFlow</a>
                                <a class="nav-link @yield('nav-chatgpt')" href="{{ url('chat-gpt') }}">ChatGPT</a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts-js')
</body>

</html>