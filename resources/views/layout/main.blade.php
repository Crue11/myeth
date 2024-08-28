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


</head>
<body>

    @yield('nav')

    <div class="container">
        @yield('content')
    </div>

    {{-- bootstrap js --}}
    <script src="{{asset('storage/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- jquery --}}
    <script src="{{asset('storage/jquery/jquery.min.js')}}"></script>

    {{--    vue.js--}}
    <script src="{{asset('storage/vue/vue.global.min.js')}}"></script>

    {{--phaser--}}
    <script src="{{asset('storage/game-engine/phaser.min.js')}}"></script>

    {{--lottie--}}
    <script src="{{asset('storage/animation/lottie.js')}}"></script>
{{--    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>--}}
    {{-- custom js --}}
    @yield('scripts')

{{--compiled js--}}
{{--    <script src="{{mix('js/app.js')}}"></script>--}}
</body>
</html>
