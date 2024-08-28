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
        /*.fruit-container{*/
        /*    background-color: #8B4513;*/
        /*}*/
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
            height: 25vh;
            position: absolute;
            left: 0;
            top: 85%;
            transform: translate(0, -85%);
            animation: startpage-fruit 1s ease-in-out;
        }
        #fruitTray-wrapper{
            width: 100%;
            height: 25vh;
            position: absolute;
            left: 0;
            top: 90%;
            transform: translate(0, -90%);
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
            transform: translate(0, -90%);;
            z-index: 0;
        }
        .fruity, .fruity-lottie{
            width: 150px;
            height: 150px;

        }
        .fruity-image{
            display: none;
            cursor: pointer;
            animation: glowing 3s linear infinite;
        }
        @keyframes glowing {
            0%{filter: drop-shadow(0 0 10px yellow)}
            50%{filter: drop-shadow(0 0 20px yellow)}
            100%{filter: drop-shadow(0 0 10px yellow)}
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
            top: 100%;
            left: 0;
            transform: translate(0, -100%);
            animation: startpage 1s ease-in-out;
        }
        @keyframes startpage {
            0%{top: -10%}
            50%{top: 100%}
            70%{top: 90%}
            100%{top: 100%}
        }
        @keyframes startpage-fruit {
            0%{top: -10%}
            50%{top: 85%}
            70%{top: 70%}
            100%{top: 85%}
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
            height: 100px;
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
                transform: translateY(0);
            }
            50% {
                transform: translateY(-50px) translateX(100px); /* Adjust this value to control the jump height */
            }
            100% {
                transform: translateY(80px) translateX(200px);
                /*opacity: 0; !* Optional: make the fruit disappear as it "dives" into the water *!*/
            }
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            let fruitArray = ['apple', 'grape', 'banana', 'orange', 'strawberry', 'pineapple', 'watermelon', 'cherry', 'blueberry'];
            let currentFruit = 0;
            let clickedFruits = 0;
            const modal = document.getElementById('quizModal');
            const span = document.getElementsByClassName('close')[0];
            const submitButton = document.getElementById('submitBtn');
            const quizQuestion = document.getElementById('quizQuestion');
            const quizOptions = document.querySelectorAll('.quiz-option');

            let currentNumber = 4;  // The number the user is learning
            let quizCount = 0;
            let maxQuizzes = 4;

            const $submitButton = $('.btn-submit');

            const questions = [
                { question: "How many fruits?", correctAnswer: 2 },
                { question: "How many fruits?", correctAnswer: 3 },
                { question: "How many fruits?", correctAnswer: 1 },
                { question: "How many fruits?", correctAnswer: 4 }
            ];

            // Initial fruit display
            changeFruit(currentFruit);

            // Function to initialize the Lottie animation
            function initializeLottie(fruitName) {
                // Remove any existing Lottie container
                $('.fruity-lottie').remove();
                // Add a new Lottie container
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
                $('.sliding-belt').css({
                    'animation': 'none'
                });
                void $('.sliding-belt')[0].offsetWidth; // Trigger reflow
                // Clear the sliding belt and movement container before adding a new fruit
                $('.sliding-belt').empty();
                $('.fruit-movement-container').empty();
                // void $('.sliding-belt')[0].offsetWidth; // Trigger reflow to reset animation
                // Add the fruit image and Lottie container
                $('.sliding-belt').append(`
            <div class="fruity-lottie"></div>
            <img src="{{asset('storage/image/${fruitArray[index]}.png')}}" alt="${fruitArray[index]}" class="fruity-image hide">
        `).css('left', '-10%');
                $('.sliding-belt').css({
                    'animation': 'walk-in 2s forwards'
                });

                // Initialize the Lottie animation
                initializeLottie(fruitArray[index]);

                clickedFruits = 0; // Reset clicked fruits count for the new fruit type
                $submitButton.hide(); // Hide the submit button initially
            }

            // Function to add a fruit image to the sliding belt
            function addFruit(index) {
                // Clear any existing animation by setting the position back to initial (optional)
                $('.sliding-belt').css({
                    'left': '0',
                    'animation': 'none'
                });

                void $('.sliding-belt')[0].offsetWidth; // Trigger reflow to reset animation

                // Append the new fruit
                $('.sliding-belt').append(
                    `<img src="{{asset('storage/image/${fruitArray[index]}.png')}}" alt="${fruitArray[index]}" class="fruity-image">`
                ).css({
                    'left': '-10%',
                    'animation': 'walk-in 2s forwards'
                });

                // Initialize the Lottie animation
                initializeLottie(fruitArray[index]);
            }

            let fN = 1;

            // Handle click event on fruits in sliding-belt
            $(document).on('click', '.sliding-belt .fruity-image', function() {
                animateFruit();
                let $fruitImage = $(this);

                // Create a unique class for each fruit and number combination
                let targetClass = `.f${fN}`;

                // Add a new div to hold the fruit and its number
                $('.fruit-movement-container').append(`<div class="f${fN} fruit-number-container"></div>`);

                // Add number beside the fruit
                $(`.f${fN}`).append(`<div class="fruit-number">${fN}</div>`);

                // Append the clicked fruit to the newly created div
                $fruitImage.appendTo(targetClass).removeClass('fruity-image').addClass('fruity-pic');

                // Apply the jump animation first
                $(targetClass).css({
                    'position': 'relative',
                    'animation': 'jumpIntoWater 1s ease forwards'
                });

                // After the jump, change the image source to the basket version
                setTimeout(() => {
                    $fruitImage.attr('src', `{{asset('storage/image/basket-${fruitArray[currentFruit]}.png')}}`);
                    $fruitImage.css({
                        'z-index': '-1'
                    });
                }, 1000); // 1-second delay to match the jump animation duration

                // Check if more fruits need to be added
                if (clickedFruits < currentFruit) {
                    addFruit(currentFruit);
                }

                // Increment the count of clicked fruits
                clickedFruits++;

                // Show the submit button if all fruits have been clicked
                if (clickedFruits === currentFruit + 1) {
                    $submitButton.show();
                }

                // Increment the number to display with the next fruit
                fN++;
            });


            $submitButton.on('click', function() {
                if (currentFruit < fruitArray.length - 1) {
                    if (quizCount < maxQuizzes) {
                        if (Math.random() > 0.5) {  // Random chance to show the quiz
                            showQuiz();
                            quizCount++;
                        }
                    }
                    currentFruit += 1;
                    changeFruit(currentFruit);
                    fN = 1;
                } else {
                    alert("All fruits have been processed!");
                }
            });

            function calculateWaveHeight(x, amplitude, frequency, phase) {
                return amplitude * Math.sin(frequency * x + phase);
            }

            function animateFruit() {
                const fruit = document.querySelector('.fruity-image');
                const waveContainer = document.querySelector('#wave2');
                const waveWidth = waveContainer.offsetWidth;
                const amplitude = 20;
                const frequency = 0.02;
                const phaseShift = 0;

                let xPos = 0;

                function update() {
                    const waveHeight = calculateWaveHeight(xPos, amplitude, frequency, phaseShift);
                    fruit.style.transform = `translateY(${waveHeight}px)`;

                    xPos += 1;
                    if (xPos > waveWidth) xPos = 0;

                    requestAnimationFrame(update);
                }

                update();
            }

            function showQuiz() {
                let randomIndex = Math.floor(Math.random() * questions.length);
                let selectedQuestion = questions[randomIndex];
                quizQuestion.innerText = selectedQuestion.question;

                // Shuffle answers and assign to buttons
                let options = [1, 2, 3];
                options.sort(() => Math.random() - 0.5);
                quizOptions.forEach((button, index) => {
                    button.innerText = options[index];
                    button.dataset.answer = options[index];
                    button.onclick = () => {
                        checkAnswer(button, selectedQuestion.correctAnswer);
                    };
                });

                modal.style.display = 'block';
            }
            function checkAnswer(button, correctAnswer) {
                if (parseInt(button.dataset.answer) === correctAnswer) {
                    alert('Correct!');
                } else {
                    alert('Wrong answer. Try again!');
                }
                modal.style.display = 'none';
            }

            span.onclick = function () {
                modal.style.display = 'none';
            };

            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
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
        <div class="btn-submit btn btn-danger">SUBMIT</div>
        <div class="fruit-movement-container"></div>
    </section>
    <section aria-label="Section Page's Animation" id="bg-animation">
        <article class="open-close"></article>
        <article id="wave">
            <div id="wave1"></div>
            <div id="wave2"></div>
            <div id="wave3"></div>
        </article>
        <article id="land">
            <img src="{{asset('storage/image/land.png')}}" alt="Land Ho!">
        </article>
    </section>
    <div id="quizModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="quizQuestion"></p>
            <button class="quiz-option" data-answer="1">1</button>
            <button class="quiz-option" data-answer="2">2</button>
            <button class="quiz-option" data-answer="3">3</button>
        </div>
    </div>
@endsection
