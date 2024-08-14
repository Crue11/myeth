@extends('layout.main')
@section('styles')
    <style>
        .card-holder {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 80vw;
        }

        .card-body {
            position: relative;
            width: 200px;
            height: 300px;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .flipped {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .flip-card-back {
            transform: rotateY(180deg);
        }

        .card-body img {
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;
            filter: drop-shadow(0 0 10px rgba(0,0,0,0.5));
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.card-body').on('click', function(){
                $(this).find('.flip-card-inner').toggleClass('flipped');
            });
        });
    </script>
@endsection

@section('content')
    <section aria-label="Section Index Page's Navigation" class="w-100 h-100 d-flex justify-content-center align-items-center">
        <article class="card-holder d-flex justify-content-evenly align-items-center flex-row h-100">
            <div class="card-body w-50 h-60 justify-content-center d-flex align-items-center">
                <div class="flip-card-inner">
                    <div class="flip-card-front justify-content-center d-flex align-items-center">
                        <img src="storage/image/cat_samurai.jpg" alt="Front Image" class="w-50 h-100">
                    </div>
                    <div class="flip-card-back card d-flex justify-content-center flex-column align-items-center gap-5">
                        <h2>Symbol of Numbers</h2>
                        <div>
                            Description...
                        </div>
                        <a href="#"><button class="btn btn-primary">Let's Play!</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body w-50 h-60 justify-content-center d-flex align-items-center">
                <div class="flip-card-inner">
                    <div class="flip-card-front justify-content-center d-flex align-items-center">
                        <img src="storage/image/cat_samurai.jpg" alt="Front Image" class="w-50 h-100">
                    </div>
                    <div class="flip-card-back card d-flex justify-content-center flex-column align-items-center gap-5">
                        <h2>Completion of 10</h2>
                        <div>
                            Description...
                        </div>
                        <a href="#"><button class="btn btn-primary">Let's Play!</button></a>
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
