@extends('layout.main')

@section('styles')
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body, .container{
            width: 100vw;
            height: 100vh;
            background-color: skyblue;
        }
        a{
            text-decoration: none;
        }
        .menu-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            width: 100%;
            height: 100%;
        }

        .menu-item {
            width: 15%;
            height: 80%;
            background-color: #e0e0e0;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
            flex-shrink: 0; /* Prevents shrinking of non-active items */
        }

        .menu-item.expanded {
            width: 50%; /* Adjust this value as needed for the expanded state */
        }

        .card-content {
            text-align: center;
            font-size: clamp(1rem, 0.3043rem + 3.4783vw, 3rem);
            padding: 1rem;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function expandCard(element) {
            const items = document.querySelectorAll('.menu-item');
            items.forEach(item => {
                item.classList.remove('expanded'); // Remove expanded class from all
            });
            element.classList.add('expanded'); // Add expanded class to the clicked item
        }
    </script>
@endsection

@section('content')
    <section aria-label="Expandable Menu" class="menu-container">
        <div class="menu-item" onclick="expandCard(this)">
            <div class="card-content">
                <p>Let's Learn 1 to 9!</p>
                <a href="{{route('symbol.learn')}}"><button class="btn btn-danger">Learn!</button></a>
            </div>
        </div>
        <div class="menu-item" onclick="expandCard(this)">
            <div class="card-content">
                <p>Test Modal</p>
                <a href="{{route('symbol.test')}}"><button class="btn btn-danger">TEST</button></a>
            </div>
        </div>
        <div class="menu-item" onclick="expandCard(this)">
            <div class="card-content">Game 2</div>
        </div>
        <div class="menu-item" onclick="expandCard(this)">
            <div class="card-content">Game 3</div>
        </div>
    </section>
@endsection
