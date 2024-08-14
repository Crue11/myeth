<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYETH</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{asset('storage/bootstrap/css/bootstrap.min.css')}}">
    {{-- css --}}
    @yield('styles')

{{--    vue.js--}}
    <script src="{{asset('storage/vue/vue.global.min.js')}}"></script>
</head>
<body>

{{--    <div id="app">--}}
{{--        <flip-card></flip-card>--}}
{{--    </div>--}}

    <div class="container">
        @yield('content')
    </div>

    {{-- bootstrap js --}}
    <script src="{{asset('storage/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- jquery --}}
    <script src="{{asset('storage/jquery/jquery.min.js')}}"></script>

    {{-- custom js --}}
    @yield('scripts')

{{--compiled js--}}
{{--    <script src="{{mix('js/app.js')}}"></script>--}}
</body>
</html>
