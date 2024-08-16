@extends('layout.main')
@section('styles')
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        .card{
            background-color: transparent;
            border: 0;
        }
        .card a{
            z-index: 10;
        }
        .card-holder {
            width: 100%;
            z-index: 10;
        }
        .card-body {
            position: relative;
            width: 40%;
            perspective: 1000px;
        }
        .card-body img {
             display: block;
             width: 100%;
             height: 100%;
             cursor: pointer;
             filter: drop-shadow(0 0 10px rgba(0,0,0,0.5));
         }
        .maincontainer{
            background-image: linear-gradient(0deg, #061d54, #155666);
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
        .flip-card-inner {
            position: relative;
            width: 50%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            cursor: pointer;
            z-index: 5;
        }
        .flipped {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            overflow: hidden;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
        .btn-go{
            position: absolute;
            top: 80vh;
        }
        .btn-go button{
            padding: 10px 40px;
            border-radius: 14px;
            cursor: pointer;
            border-style: solid;
        }
        .btn-card1 button{
            background-color: #FBD3D4;
            border-color: #FF6A6A;
            color: #FF6A6A;
        }

        .btn-card2 button{
            background-color: #E0EFFB;
            border-color: #8AC4FF;
            color: #8AC4FF;
        }

        .btn-card1 button:hover{
            background-color: #E0EFFB;
            border-color: #8AC4FF;
            color: #8AC4FF;
        }
        #bg-animation{
             position: absolute;
             top: 0;
             left: 0;
             width: 100%;
             height: 100%;
             z-index: 0;
             overflow: hidden;
         }
        section .moon{
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        section .moon img{
            width: 50vw;
            height: auto;
            margin-top: 50%;
            color: #111;
            background: #EAEBED;
            box-shadow: 0 0 100px white;
            border-radius: 100%;
        }
        section .wave{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('storage/assets/wave.png');
            background-size: 1000px 100px;
        }
        section .wave.wave1{
            animation: animate 25s cubic-bezier(0.37, 0, 0.63, 1) infinite;
            z-index: 998;
            opacity: 1;
            animation-delay: 0s;
            bottom: 20px;
            filter: invert(73%) sepia(74%) saturate(1277%) hue-rotate(161deg) brightness(50%) contrast(101%);
        }
        section .wave.wave2{
            animation: animate1 15s linear infinite;
            z-index: 999;
            /* opacity: 0.5; */
            animation-delay: -3s;
            filter: invert(73%) sepia(74%) saturate(1277%) hue-rotate(161deg) brightness(80%) contrast(101%);
        }
        section .wave.wave3{
            animation: animate2 40s cubic-bezier(0.5, 1, 0.89, 1) infinite;
            z-index: 1000;
            animation-delay: -7s;
            filter: invert(73%) sepia(74%) saturate(1277%) hue-rotate(161deg) brightness(135%) contrast(101%);
        }

        @keyframes animate {
            0%{
                background-position-x: 0;
            }
            100%{
                background-position-x: 1000px;
            }
        }

        @keyframes animate2 {
            0%{
                background-position-x: 0;
            }
            100%{
                background-position-x: -1000px;
            }
        }

        @keyframes animate1 {
            0%{
                background-position-x: 0;
            }
            100%{
                background-position-x: 1000px;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // flip card toggle
            $('.card-body').on('click', function(){
                $(this).find('.flip-card-inner').toggleClass('flipped');
            });

            // // background
            // $('.flip-card-inner').on('mouseover', function(){
            //     $('body').css({
            //         'background-image': 'linear-gradient(to right, #000, #444)' // Correct property for gradient
            //     });
            // });
            // $('.flip-card-inner').on('mouseout', function(){
            //     $('body').css({
            //         'background-image': '' // Resetting the background
            //     });
            // });
        });
    </script>
@endsection

@section('content')
    <section aria-label="Section Index Page's Navigation" class="d-flex justify-content-center align-items-center w-100 h-100 maincontainer">
        <article class="card-holder d-flex justify-content-evenly align-items-center flex-row w-75 h-75">
{{--            Symbol Number Page--}}
            <div class="card-body h-75 justify-content-center d-flex align-items-center">
                <div class="flip-card-inner">
                    <div class="flip-card-front justify-content-center d-flex align-items-center">
                        <img src="storage/assets/SVG/card1.svg"/>
                    </div>
                    <div class="flip-card-back justify-content-center d-flex align-items-center">
                        <div class="card d-flex justify-content-center flex-column align-items-center">
                            <img src="storage/assets/SVG/card1back.svg"/>
                            <a href="{{route('symbolPage')}}" class="btn-go btn-card1"><button>Let's Play!</button></a>
                        </div>
                    </div>
                </div>
            </div>
{{--            completion 10 page--}}
            <div class="card-body h-75 justify-content-center d-flex align-items-center">
                <div class="flip-card-inner">
                    <div class="flip-card-front justify-content-center d-flex align-items-center">
                        <img src="storage/assets/SVG/card2.svg"/>
                    </div>
                    <div class="flip-card-back justify-content-center d-flex align-items-center">
                        <div class="card d-flex justify-content-center flex-column align-items-center">
                            <img src="storage/assets/SVG/card2back.svg"/>
                            <a href="{{route('completionPage')}}" class="btn-go btn-card2"><button>Let's Play!</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="bg-gradient"></article>
        <section id="bg-animation">
            <div class="wave wave2"></div>
            <div class="wave wave1"></div>
            <div class="wave wave3"></div>
            <div class="moon">
                <img src="storage/assets/moon.svg" alt="Moon Background">
            </div>
        </section>
    </section>

@endsection
