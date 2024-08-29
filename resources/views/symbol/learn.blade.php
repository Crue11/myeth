
@extends('layout.main')

@include('symbol.nav')

@section('styles')
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        header{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            width: 100%;
        }
        body{
            background-color: #87ceeb;
            z-index: -1;
        }
        .container{
            height: 100%;
            width: 100%;
        }
        .basket-container{
            gap: 2rem;
            display: grid;
            grid-template-rows: repeat(3, 1fr);
            justify-items: center;
            align-items: center;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -70%);
            padding: 0;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc; /* You can style the cards as you like */
            padding: 10px;
            /*background-color: #f9f9f9;*/
            border-radius: 0.5rem;
            width: 15%; /* Adjust size as needed */
            height: auto; /* Adjust size as needed */
        }
        .card img {
            width: 100%; /* Adjust size as needed */
            height: 100%; /* Adjust size as needed */
        }
        .card strong {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%, -90%);
            font-size: 24px;
        }
        .hide{
            display: none;
        }
        .toggle-nav{
            width: 3vw;
        }
        .basket,.basket-body{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        #basket-wrapper{
            z-index: 10;
        }
        .basket-body img{
            filter: drop-shadow(0 5px 5px rgba(0,0,0,0.5));
        }
        .basket-body strong{
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -70%);
            font-size: 32px;
            color: black;
        }
        #tray-wrapper{
            width: 100vw;
            height: 100vh;
            position: absolute;
            left: 0;
            top: 100%;
            overflow: hidden;
            transform: translate(0, -100%);
            animation: startpage-fruit 1s ease-in-out;
        }
        #fruitTray-wrapper{
            width: 100%;
            height: 25vh;
            position: absolute;
            left: 0;
            top: 80%;
            transform: translate(0, -80%);
            z-index: 1;
        }
        .fruit-movement-container{
            width: max-content;
            height: auto;
            display: flex;
            flex-direction: row-reverse;
            position: absolute;
            left: 20%;
            top: 80%;
            transform: translate(0, -80%);;
            z-index: 0;
        }
        .fruity, .fruity-lottie{
            width: 150px;
            height: 150px;

        }
        .fruity-image{
            display: none;
            cursor: pointer;
            animation: blob 1s linear infinite;
        }
        @keyframes blob {
            0%{transform: scale(1)}
            20%{transform: scale(1.1)}
            40%{transform: scale(1)}
            60%{transform: scale(1.1)}
            80%{transform: scale(1)}
            100%{transform: scale(1)}
        }
        .fruit-number{
            position: absolute;
            top: 0;
            right: 0;
            transform: translate(0, 0);
            font-size: 60px;
            animation: ani-number 1s ease;
            z-index: 1;
        }
        .sliding-belt:hover{
            transform: scale(1.1);
        }
        .slideshow-container{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
        }
        .sliding-belt{
            position: absolute;
            left: -10%;
        }
        .slider{
            width: 150px;
        }
        .btn-container{
            width: 100%;
            height: 25vh;
            display: flex;
            justify-content: center;
        }
        .btn-tray{
            display: flex;
            align-items: center;
            gap: 10px;
            height: 100%;
            width: 40%;
        }
        .btn-tray button{
            border: 1px solid transparent;
            border-radius: 0.5rem;
            background-color: white;
            padding: 10px;
        }
        .btn-submit{
            display: none;
        }
        #bg-animation{
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
        #land{
            position: absolute;
            top: 95%;
            left: 0;
            transform: translate(0, -100%);
            animation: startpage 1s ease-in-out;
        }
        @keyframes startpage {
            0%{top: -10%}
            50%{top: 95%}
            70%{top: 80%}
            100%{top: 95%}
        }
        @keyframes startpage-fruit {
            0%{top: -10%}
            50%{top: 100%}
            70%{top: 90%}
            100%{top: 100%}
        }
        @keyframes walk-in {
            0%{left: -10%}
            100%{left: 20%}
        }
        .btn-submit{
            position: absolute;
            top: 90%;
            right: 5%;
            z-index: 10;
        }
        #bg-animation{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        /* Wave Container */
        #wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 110px;
            z-index: 10;
            overflow: hidden;
        }

        /* Each Wave */
        #wave1, #wave2, #wave3 {
            position: absolute;
            width: 500%; /* Make the wave wider than the container to enable sliding */
            height: 100%;
            background: url("{{asset('storage/assets/wave.png')}}") repeat-x;
            background-size: contain; /* Adjust based on your image's proportions */
            opacity: 1;
        }

        /* Wave 1 - back Wave */
        #wave1 {
            animation: wavy1 35s linear infinite;
            filter: invert(73%) sepia(74%) saturate(1277%) hue-rotate(161deg) brightness(50%) contrast(101%);
        }

        /* Wave 2 - Middle Wave */
        #wave2 {
            animation: wavy2 20s linear infinite;
            animation-delay: -3s;
            filter: invert(73%) sepia(74%) saturate(1277%) hue-rotate(161deg) brightness(80%) contrast(101%);
        }

        /* Wave 3 - front Wave */
        #wave3 {
            animation: wavy3 10s linear infinite;
            filter: invert(73%) sepia(74%) saturate(1277%) hue-rotate(161deg) brightness(135%) contrast(101%);
        }

        /* Keyframes for Wave 1 */
        @keyframes wavy1 {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: 1000px;
            }
        }

        /* Keyframes for Wave 2 */
        @keyframes wavy2 {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: -1000px;
            }
        }

        /* Keyframes for Wave 3 */
        @keyframes wavy3 {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: 1000px;
            }
        }

        .open-close{
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            z-index: 99;
            background-color: #0097c1;
            animation: open 1s forwards;
        }
        .selectDisable {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
        }

        .selectEnable {
            -webkit-user-select: text;
            -khtml-user-select: text;
            -moz-user-select: text;
            -o-user-select: text;
            user-select: text;
        }
        @keyframes open{
            0%{top: 0}
            100%{top: 100%}
        }
        @keyframes ani-number {
            0%{font-size: 60px}
            30%{font-size: 90px}
            60%{font-size: 60px}
            90%{font-size: 90px}
            100%{font-size: 60px}
        }
        @keyframes hovering {
            0%{margin-bottom: 0}
            50%{margin-bottom: 4rem}
            100%{margin-bottom: 0}
        }
        @keyframes jumpIntoWater {
            0% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-50px) translateX(100px) scale(2); /* Adjust this value to control the jump height */
            }
            100% {
                transform: translateY(80px) translateX(200px) scale(1);
                /*opacity: 0; !* Optional: make the fruit disappear as it "dives" into the water *!*/
            }
        }
        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #2d2d2d;
            padding: 20px;
            border-radius: 10px;
            width: max-content;
            height: min-content;
            text-align: center;
            color: white;
            font-size: clamp(1.5rem, 0.3043rem + 1vw, 3rem);
        }
        .answer-buttons {
            margin-top: 20px;
        }

        .answer-btn {
            background-color: #47a8f5;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 8px;
        }

        .answer-btn:hover {
            background-color: #3d94db;
        }

        .fruit-container {
            display: grid;
            grid-template-columns: repeat(3, 0fr);
            grid-template-rows: repeat(3, 1fr);
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            width: 100%;
            height: 100%;
        }
        .fruit-image{
            width: 10vw;
            height: auto;
        }
        .fruit-image:hover{
            animation: happy 0.5s ease-in-out;
        }
        @keyframes happy {
            0%{transform: translateY(0)}
            50%{transform: translateY(-50px)}
            100%{transform: translateY(0)}
        }
        #ct{
            position: absolute;
            bottom: 20%;
            left: 0;
            transform: translate(0, -20%)
        }
        #cloud{
            position: absolute;
            top: 10%;
            left: 0;
            width: 100%;
            height: 40%;
            z-index: 0;
        }
        #cloud1{
            position: absolute;
            width: 100%; /* Make the wave wider than the container to enable sliding */
            height: 40%;
            background: url("{{asset('storage/image/cloud.png')}}") repeat-x;
            background-size: contain; /* Adjust based on your image's proportions */
            opacity: 1;
        }
        #cloud1, #cloud3{
            animation: wavy1 30s linear infinite;
        }
        #cloud2{
            animation: wavy2 30s linear infinite;
        }
        .exitScreen{
            animation: exit 3s linear;
        }
        @keyframes exit {
            0%{transform: translateX(0) translateY(-100px)}
            100%{transform: translateX(1200px) translateY(-100px)}
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let fruitArray = ['apple', 'grape', 'banana', 'orange', 'strawberry', 'pineapple', 'watermelon', 'cherry', 'blueberry'];
            let quiz = [];
            let currentFruit = 0;
            let clickedFruits = 0;
            let currentNumber = 4;
            let quizCount = 0;
            let maxQuizzes = 4;
            let correctAnswer;  // Make correctAnswer global for accessibility

            const $submitButton = $('.btn-submit');

            // Initial fruit display
            changeFruit(currentFruit);

            // Function to initialize the Lottie animation
            function initializeLottie(fruitName) {
                $('.fruity-lottie').remove(); // Remove existing Lottie container
                $('.sliding-belt').prepend('<div class="fruity-lottie"></div>');

                var walkAnimation = lottie.loadAnimation({
                    container: document.querySelector('.fruity-lottie'),
                    renderer: 'svg',
                    loop: false,
                    autoplay: true,
                    path: `{{asset('storage/animation/json/walk-${fruitName}.json')}}`
                });

                walkAnimation.addEventListener('enterFrame', function(event) {
                    if (event.currentTime === 0) {
                        $('.fruity-image').hide();
                        $('.fruity-lottie').show();
                    }
                });

                walkAnimation.addEventListener('complete', function() {
                    $('.fruity-image').show();
                    $('.fruity-lottie').hide();
                });

                return walkAnimation;
            }

            // Function to display the current fruit
            function changeFruit(index) {
                $('.sliding-belt').css('animation', 'none');
                void $('.sliding-belt')[0].offsetWidth; // Trigger reflow
                $('.sliding-belt').empty();
                $('.fruit-movement-container').empty().removeClass('exitScreen');

                $('.sliding-belt').append(`
                <div class="fruity-lottie"></div>
                <img src="{{asset('storage/image/${fruitArray[index]}.png')}}" alt="${fruitArray[index]}" class="fruity-image hide">
            `).css('left', '-10%');

                $('.sliding-belt').css('animation', 'walk-in 2s forwards');
                initializeLottie(fruitArray[index]);

                clickedFruits = 0; // Reset clicked fruits count for the new fruit type
                $submitButton.hide(); // Hide the submit button initially
            }

            function addFruit(index) {
                $('.sliding-belt').css('animation', 'none');
                void $('.sliding-belt')[0].offsetWidth; // Trigger reflow

                $('.sliding-belt').append(
                    `<img src="{{asset('storage/image/${fruitArray[index]}.png')}}" alt="${fruitArray[index]}" class="fruity-image">`
                ).css({
                    'left': '-10%',
                    'animation': 'walk-in 2s forwards'
                });

                initializeLottie(fruitArray[index]);
            }

            let fN = 1;

            $(document).on('click', '.sliding-belt .fruity-image', function() {
                animateFruit();
                let $fruitImage = $(this);
                let targetClass = `.f${fN}`;

                $('.fruit-movement-container').append(`<div class="f${fN} fruit-number-container"></div>`);
                $(`.f${fN}`).append(`<div class="fruit-number">${fN}</div>`);
                $fruitImage.appendTo(targetClass).removeClass('fruity-image').addClass('fruity-pic');

                $(targetClass).css({
                    'position': 'relative',
                    'animation': 'jumpIntoWater 1s ease forwards'
                });

                setTimeout(() => {
                    $fruitImage.attr('src', `{{asset('storage/image/basket-${fruitArray[currentFruit]}.png')}}`);
                    $fruitImage.css('z-index', '-1');
                }, 1000);

                if (clickedFruits < currentFruit) {
                    addFruit(currentFruit);
                }

                clickedFruits++;
                if (clickedFruits === currentFruit + 1) {
                    $submitButton.show();
                }

                fN++;
            });

            $submitButton.on('click', function() {
                $submitButton.hide();
                if (currentFruit < fruitArray.length - 1) {
                    if (quizCount < maxQuizzes) {
                        if (Math.random() > 0.5) {  // Random chance to show the quiz
                            generateQuiz();
                            quizCount++;
                        }
                    }
                    $('.fruit-movement-container').addClass('exitScreen');
                    setTimeout(() => {
                        currentFruit += 1;
                        changeFruit(currentFruit);
                        fN = 1;
                    }, 3000)
                } else {
                    window.location.href = '{{route('symbolPage')}}';
                }
            });

            function animateFruit() {
                const fruit = document.querySelector('.fruity-image');
                const waveContainer = document.querySelector('#wave2');
                const waveWidth = waveContainer.offsetWidth;
                const amplitude = 20;
                const frequency = 0.02;

                let xPos = 0;

                function update() {
                    const waveHeight = amplitude * Math.sin(frequency * xPos);
                    fruit.style.transform = `translateY(${waveHeight}px)`;

                    xPos += 1;
                    if (xPos > waveWidth) xPos = 0;

                    requestAnimationFrame(update);
                }

                update();
            }

            function generateQuiz() {
                console.log('Quiz modal triggered');
                console.log(quiz)

                correctAnswer = Math.floor(Math.random() * currentFruit) + 1;
                let index = quiz.indexOf(correctAnswer);

                if(index > 1){
                    console.log('number already exist')
                    correctAnswer = Math.floor(Math.random() * currentFruit) + 1;
                    index = quiz.indexOf(correctAnswer);
                }

                let wrongAnswers = generateWrongAnswers(correctAnswer, currentFruit);

                document.getElementById('questionText').innerText = `How many apples are there?`;

                let fruitContainer = document.getElementById('fruitContainer');
                fruitContainer.innerHTML = '';
                for (let i = 0; i < correctAnswer; i++) {
                    let fruitImage = document.createElement('img');
                    fruitImage.src = '{{asset("storage/image/apple.png")}}'; // Replace with the correct path
                    fruitImage.className = 'fruit-image';
                    fruitContainer.appendChild(fruitImage);
                }

                let buttons = document.querySelectorAll('.answer-btn');
                let answers = [correctAnswer, ...wrongAnswers].sort(() => Math.random() - 0.5);
                buttons.forEach((button, index) => {
                    button.innerText = answers[index];
                    button.dataset.answer = answers[index];
                });

                document.getElementById('quizModal').style.display = 'flex';


                quiz.push(correctAnswer);
            }
            function generateWrongAnswers(correctAnswer, max) {
                let wrongAnswers = new Set();

                // Ensure that the max value is large enough to generate unique wrong answers
                if (max <= 2) {
                    // If max is too small to generate unique wrong answers
                    let possibleAnswers = [1, 2, 3].filter(num => num !== correctAnswer);
                    wrongAnswers = new Set(possibleAnswers.slice(0, 2));
                } else {
                    // Standard wrong answer generation
                    while (wrongAnswers.size < 2) {
                        let wrongAnswer = Math.floor(Math.random() * max) + 1;
                        if (wrongAnswer !== correctAnswer) {
                            wrongAnswers.add(wrongAnswer);
                        }
                    }
                }

                return [...wrongAnswers];
            }
            document.querySelectorAll('.answer-btn').forEach(button => {
                button.addEventListener('click', function() {
                    checkAnswer(this);
                });
            });
            function checkAnswer(button) {
                if (parseInt(button.dataset.answer) === correctAnswer) {
                    alert('Correct!');
                    closeModal();
                } else {
                    alert('Try again!');
                }
            }
            function closeModal() {
                document.getElementById('quizModal').style.display = 'none';
            }
        });
    </script>

@endsection

@section('content')
    <section aria-label="Section fruitTray Page's Tray" id="tray-wrapper">
        <div id="fruitTray-wrapper">
            <article class="slideshow-container">
                <div class="sliding-belt d-flex flex-row align-items-center"></div>
            </article>
        </div>
        <div class="btn-submit btn btn-danger">NEXT FRUIT</div>
        <div class="fruit-movement-container"></div>
    </section>
    <section aria-label="Section Page's Animation" id="bg-animation">
        <article class="open-close"></article>
        <article id="cloud">
            <div id="cloud1"></div>
            <div id="cloud2"></div>
            <div id="cloud3"></div>
        </article>
        <article id="wave">
            <div id="wave1"></div>
            <div id="wave2"></div>
            <div id="wave3"></div>
        </article>
        <article id="land">
            <img src="{{asset('storage/image/coconut-tree.png')}}" alt="Coconut Tree" id="ct">
            <img src="{{asset('storage/image/land.png')}}" alt="Land Ho!">
        </article>
    </section>
    <div id="quizModal" class="modal">
        <div class="modal-content">
            <p id="questionText">How many apples are there?</p>
            <div id="fruitContainer" class="fruit-container align-items-center"></div>
            <div class="answer-buttons">
                <button class="answer-btn">1</button>
                <button class="answer-btn">3</button>
                <button class="answer-btn">5</button>
            </div>
        </div>
    </div>
@endsection
