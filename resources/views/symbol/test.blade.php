@extends('layout.main')

@section('styles')
    <style>
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
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            let fruitArray = ['apple', 'grape', 'banana', 'orange', 'strawberry', 'pineapple', 'watermelon', 'cherry', 'blueberry'];
            let currentFruit = 9;
            let clickedFruits = 0;
            let currentNumber = 4;
            let quizCount = 0;
            let maxQuizzes = 4;
            let correctAnswer;  // Make correctAnswer global for accessibility
            function generateQuiz() {
                console.log('Quiz modal triggered');
                // currentFruit = 5; // Temporarily hard-coding a value
                // correctAnswer = 3; // Hard-coding the correct answer
                // let wrongAnswers = [1, 4]; // Hard-coding wrong answers

                correctAnswer = Math.floor(Math.random() * currentFruit) + 1;
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
            function checkAnswer(button) {
                if (parseInt(button.dataset.answer) === correctAnswer) {
                    $('.check-change-answer').innerHTML = 'Correct!';
                    closeModal();
                } else {
                    $('.check-change-answer').innerHTML = 'Try Again!';
                }
            }

            document.querySelectorAll('.answer-btn').forEach(button => {
                button.addEventListener('click', function() {
                    checkAnswer(this);
                });
            });

            function closeModal() {
                document.getElementById('quizModal').style.display = 'none';
            }

            $('.btn').on('click', function(){
                generateQuiz();
            })

            $('.btnChange').on('click', function() {
                const fruitNumber = parseInt(this.innerHTML, 10);

                if (fruitNumber >= 1 && fruitNumber <= 9) {
                    currentFruit = fruitNumber;
                }

                $('.currentF').empty().append(currentFruit);
            });
        })
    </script>
@endsection

@section('content')
    <button class="btnChange">1</button>
    <button class="btnChange">2</button>
    <button class="btnChange">3</button>
    <button class="btnChange">4</button>
    <button class="btnChange">5</button>
    <button class="btnChange">6</button>
    <button class="btnChange">7</button>
    <button class="btnChange">8</button>
    <button class="btnChange">9</button>

    <button class="btn btn-danger">TEST</button>
    <div class="check">
        <p class="currentF">Current Fruit:</p>
        <p class="check-change-answer">Check answer here!</p>
    </div>
    <div id="quizModal" class="modal">
        <div class="modal-content">
            <p id="questionText">How many apples are there?</p>
            <div id="fruitContainer" class="fruit-container"></div>
            <div class="answer-buttons">
                <button class="answer-btn" onclick="checkAnswer(this)">1</button>
                <button class="answer-btn" onclick="checkAnswer(this)">3</button>
                <button class="answer-btn" onclick="checkAnswer(this)">5</button>
            </div>
        </div>
    </div>
@endsection
