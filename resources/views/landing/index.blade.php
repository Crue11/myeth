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
        }
        .maincontainer{
            /*background-image: linear-gradient(0deg, #061d54, #155666); night*/
            background-image: linear-gradient(0deg, #8dc7f0, #c2feff); /*day*/
            /*background-image: linear-gradient(0deg, #ff4d00,#300070); sunset*/
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }
        .flip-card-inner {
            position: relative;
            width: 60%;
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
            filter: drop-shadow(0 0 10px rgba(0,0,0,0.5));
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
        .btn-go{
            position: absolute;
            top: 40vh;
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
        section .cloud{
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
            position: absolute;
            z-index: 999;
        }
        section .moon{
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
            position: absolute;
        }
        section .moon img{
            width: 50vw;
            height: auto;
            margin-top: 100%;
            color: #111;
            background: #EAEBED;
            box-shadow: 0 0 100px white;
            border-radius: 100%;
        }
        section .sun{
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        section .sun img{
            width: 50vw;
            height: auto;
            margin-top: -70%;
            color: #111;
            filter: drop-shadow(0 0 200px rgba(250,207,8,1)) drop-shadow(0 0 50px rgba(250,207,8,0.2));
            animation: rotate 40s linear infinite;
        }
        .moon-movedown{ /*card1*/
            margin-top: 30%;
            transition: 1.9s cubic-bezier(0.65, 0, 0.35, 1);
        }
        .moon-moveup{ /*card1*/
            margin-top: -30%;
            transition: 3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .sun-movedown{ /*card1*/
            margin-top: 60%;
            transition: 2s cubic-bezier(0.65, 0, 0.35, 1);
            filter: drop-shadow(0 0 200px rgba(250,207,8,1)) drop-shadow(0 0 50px rgba(250,207,8,0.2)) invert(38%) sepia(26%) saturate(4849%) hue-rotate(3deg) brightness(108%) contrast(105%);
        }
        .sun-moveup{ /*card1*/
            margin-top: 0%;
            transition: 2s cubic-bezier(0.65, 0, 0.35, 1);
            filter: drop-shadow(0 0 200px rgba(250,207,8,1)) drop-shadow(0 0 50px rgba(250,207,8,0.2));
        }
        .sun-moveupcard2{ /*card2*/
            margin-top: -40%;
            transition: 1s cubic-bezier(0.65, 0, 0.35, 1);
        }

        .sun-movedowncard2{ /*card2*/
            margin-top: 0%;
            transition: 2s cubic-bezier(0.65, 0, 0.35, 1);
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .background-DayToSunset{
            animation: gradientDayToSunset 1.5s ease-in-out forwards;
        }
        .background-SunsetToDay{
            animation: gradientSunsetToDay 2s ease-in-out forwards;
        }
        .background-DayToNight{
            animation: gradientDayToNight 1.5s ease-in-out forwards;
        }
        .background-NightToDay{
            animation: gradientNightToDay 1.5s ease-in-out forwards;
        }
        .background-NightToSunset{
            animation: gradientNightToSunset 1.5s ease-in-out forwards;
        }
        .background-SunsetToNight{
            animation: gradientSunsetToNight 1.5s ease-in-out forwards;
        }
        @keyframes gradientDayToNight {
            0%{background-image: linear-gradient(0deg,#061d54,#155466)}
            2.5%{background-image: linear-gradient(0deg,#092158,#1a586a)}
            5%{background-image: linear-gradient(0deg,#0d255c,#1f5c6d)}
            7.5%{background-image: linear-gradient(0deg,#102860,#246071)}
            10%{background-image: linear-gradient(0deg,#142c64,#286475)}
            12.5%{background-image: linear-gradient(0deg,#173068,#2d6878)}
            15%{background-image: linear-gradient(0deg,#1a346c,#316c7c)}
            17.5%{background-image: linear-gradient(0deg,#1d3870,#357080)}
            20%{background-image: linear-gradient(0deg,#203c74,#3a7484)}
            22.5%{background-image: linear-gradient(0deg,#234078,#3e7887)}
            25%{background-image: linear-gradient(0deg,#26447c,#427d8b)}
            27.5%{background-image: linear-gradient(0deg,#294880,#46818f)}
            30%{background-image: linear-gradient(0deg,#2c4d84,#4b8593)}
            32.5%{background-image: linear-gradient(0deg,#305188,#4f8996)}
            35%{background-image: linear-gradient(0deg,#33558c,#538d9a)}
            37.5%{background-image: linear-gradient(0deg,#365990,#57929e)}
            40%{background-image: linear-gradient(0deg,#395e94,#5b96a2)}
            42.5%{background-image: linear-gradient(0deg,#3c6298,#609aa6)}
            45%{background-image: linear-gradient(0deg,#3f669c,#649faa)}
            47.5%{background-image: linear-gradient(0deg,#436ba0,#68a3ae)}
            50%{background-image: linear-gradient(0deg,#466fa4,#6da7b2)}
            52.5%{background-image: linear-gradient(0deg,#4974a8,#71acb6)}
            55%{background-image: linear-gradient(0deg,#4d78ac,#75b0ba)}
            57.5%{background-image: linear-gradient(0deg,#507cb0,#7ab5be)}
            60%{background-image: linear-gradient(0deg,#5481b4,#7eb9c2)}
            62.5%{background-image: linear-gradient(0deg,#5786b8,#82bec6)}
            65%{background-image: linear-gradient(0deg,#5b8abc,#87c2ca)}
            67.5%{background-image: linear-gradient(0deg,#5e8fc0,#8bc7ce)}
            70%{background-image: linear-gradient(0deg,#6293c4,#90cbd2)}
            72.5%{background-image: linear-gradient(0deg,#6698c8,#94d0d6)}
            75%{background-image: linear-gradient(0deg,#699ccc,#99d4da)}
            77.5%{background-image: linear-gradient(0deg,#6da1d0,#9dd9de)}
            80%{background-image: linear-gradient(0deg,#71a6d4,#a2dde2)}
            82.5%{background-image: linear-gradient(0deg,#75aad8,#a6e2e6)}
            85%{background-image: linear-gradient(0deg,#79afdc,#abe7ea)}
            87.5%{background-image: linear-gradient(0deg,#7db4e0,#afebee)}
            90%{background-image: linear-gradient(0deg,#81b9e4,#b4f0f2)}
            92.5%{background-image: linear-gradient(0deg,#85bde8,#b9f5f7)}
            95%{background-image: linear-gradient(0deg,#89c2ec,#bdf9fb)}
            97.5%{background-image: linear-gradient(0deg,#8dc7f0,#c2feff)}
            100%{background-image: linear-gradient(0deg,#8dc7f0,#c2feff)}
        }
        @keyframes gradientNightToDay {
            0%{background-image: linear-gradient(0deg,#8dc7f0,#c2feff)}
            2.5%{background-image: linear-gradient(0deg,#89c2ec,#bdf9fb)}
            5%{background-image: linear-gradient(0deg,#85bde8,#b9f5f7)}
            7.5%{background-image: linear-gradient(0deg,#81b9e4,#b4f0f2)}
            10%{background-image: linear-gradient(0deg,#7db4e0,#afebee)}
            12.5%{background-image: linear-gradient(0deg,#79afdc,#abe7ea)}
            15%{background-image: linear-gradient(0deg,#75aad8,#a6e2e6)}
            17.5%{background-image: linear-gradient(0deg,#71a6d4,#a2dde2)}
            20%{background-image: linear-gradient(0deg,#6da1d0,#9dd9de)}
            22.5%{background-image: linear-gradient(0deg,#699ccc,#99d4da)}
            25%{background-image: linear-gradient(0deg,#6698c8,#94d0d6)}
            27.5%{background-image: linear-gradient(0deg,#6293c4,#90cbd2)}
            30%{background-image: linear-gradient(0deg,#5e8fc0,#8bc7ce)}
            32.5%{background-image: linear-gradient(0deg,#5b8abc,#87c2ca)}
            35%{background-image: linear-gradient(0deg,#5786b8,#82bec6)}
            37.5%{background-image: linear-gradient(0deg,#5481b4,#7eb9c2)}
            40%{background-image: linear-gradient(0deg,#507cb0,#7ab5be)}
            42.5%{background-image: linear-gradient(0deg,#4d78ac,#75b0ba)}
            45%{background-image: linear-gradient(0deg,#4974a8,#71acb6)}
            47.5%{background-image: linear-gradient(0deg,#466fa4,#6da7b2)}
            50%{background-image: linear-gradient(0deg,#436ba0,#68a3ae)}
            52.5%{background-image: linear-gradient(0deg,#3f669c,#649faa)}
            55%{background-image: linear-gradient(0deg,#3c6298,#609aa6)}
            57.5%{background-image: linear-gradient(0deg,#395e94,#5b96a2)}
            60%{background-image: linear-gradient(0deg,#365990,#57929e)}
            62.5%{background-image: linear-gradient(0deg,#33558c,#538d9a)}
            65%{background-image: linear-gradient(0deg,#305188,#4f8996)}
            67.5%{background-image: linear-gradient(0deg,#2c4d84,#4b8593)}
            70%{background-image: linear-gradient(0deg,#294880,#46818f)}
            72.5%{background-image: linear-gradient(0deg,#26447c,#427d8b)}
            75%{background-image: linear-gradient(0deg,#234078,#3e7887)}
            77.5%{background-image: linear-gradient(0deg,#203c74,#3a7484)}
            80%{background-image: linear-gradient(0deg,#1d3870,#357080)}
            82.5%{background-image: linear-gradient(0deg,#1a346c,#316c7c)}
            85%{background-image: linear-gradient(0deg,#173068,#2d6878)}
            87.5%{background-image: linear-gradient(0deg,#142c64,#286475)}
            90%{background-image: linear-gradient(0deg,#102860,#246071)}
            92.5%{background-image: linear-gradient(0deg,#0d255c,#1f5c6d)}
            95%{background-image: linear-gradient(0deg,#092158,#1a586a)}
            97.5%{background-image: linear-gradient(0deg,#061d54,#155466)}
            100%{background-image: linear-gradient(0deg,#061d54,#155466)}
        }
        @keyframes gradientDayToSunset {
            0%{background-image: linear-gradient(0deg,#8dc7f0,#c2feff)}
            2.5%{background-image: linear-gradient(0deg,#90c4ea,#bef7fb)}
            5%{background-image: linear-gradient(0deg,#93c1e4,#bbf1f8)}
            7.5%{background-image: linear-gradient(0deg,#96bede,#b7eaf4)}
            10%{background-image: linear-gradient(0deg,#99bad7,#b3e4f0)}
            12.5%{background-image: linear-gradient(0deg,#9cb7d1,#afdded)}
            15%{background-image: linear-gradient(0deg,#9fb4cb,#acd7e9)}
            17.5%{background-image: linear-gradient(0deg,#a1b1c5,#a8d0e5)}
            20%{background-image: linear-gradient(0deg,#a4aebf,#a4cae2)}
            22.5%{background-image: linear-gradient(0deg,#a7abb9,#a1c3de)}
            25%{background-image: linear-gradient(0deg,#aaa8b2,#9dbdda)}
            27.5%{background-image: linear-gradient(0deg,#ada5ac,#99b6d7)}
            30%{background-image: linear-gradient(0deg,#b0a1a6,#95b0d3)}
            32.5%{background-image: linear-gradient(0deg,#b39ea0,#92a9cf)}
            35%{background-image: linear-gradient(0deg,#b69b9a,#8ea3cc)}
            37.5%{background-image: linear-gradient(0deg,#b99894,#8a9cc8)}
            40%{background-image: linear-gradient(0deg,#bc958e,#8796c4)}
            42.5%{background-image: linear-gradient(0deg,#bf9287,#838fc1)}
            45%{background-image: linear-gradient(0deg,#c28f81,#7f89bd)}
            47.5%{background-image: linear-gradient(0deg,#c58c7b,#7b82b9)}
            50%{background-image: linear-gradient(0deg,#c78875,#787cb6)}
            52.5%{background-image: linear-gradient(0deg,#ca856f,#7475b2)}
            55%{background-image: linear-gradient(0deg,#cd8269,#706fae)}
            57.5%{background-image: linear-gradient(0deg,#d07f62,#6c68ab)}
            60%{background-image: linear-gradient(0deg,#d37c5c,#6962a7)}
            62.5%{background-image: linear-gradient(0deg,#d67956,#655ba3)}
            65%{background-image: linear-gradient(0deg,#d97650,#6155a0)}
            67.5%{background-image: linear-gradient(0deg,#dc734a,#5e4e9c)}
            70%{background-image: linear-gradient(0deg,#df6f44,#5a4898)}
            72.5%{background-image: linear-gradient(0deg,#e26c3e,#564195)}
            75%{background-image: linear-gradient(0deg,#e56937,#523b91)}
            77.5%{background-image: linear-gradient(0deg,#e86631,#4f348d)}
            80%{background-image: linear-gradient(0deg,#eb632b,#4b2e8a)}
            82.5%{background-image: linear-gradient(0deg,#ed6025,#472786)}
            85%{background-image: linear-gradient(0deg,#f05d1f,#442182)}
            87.5%{background-image: linear-gradient(0deg,#f35a19,#401a7f)}
            90%{background-image: linear-gradient(0deg,#f65612,#3c147b)}
            92.5%{background-image: linear-gradient(0deg,#f9530c,#380d77)}
            95%{background-image: linear-gradient(0deg,#fc5006,#350774)}
            97.5%{background-image: linear-gradient(0deg,#ff4d00,#310070)}
            100%{background-image: linear-gradient(0deg,#ff4d00,#310070)}
        }
        @keyframes gradientSunsetToDay {
            0%{background-image: linear-gradient(0deg,#ff4d00,#310070)}
            2.5%{background-image: linear-gradient(0deg,#fc5006,#350774)}
            5%{background-image: linear-gradient(0deg,#f9530c,#380d77)}
            7.5%{background-image: linear-gradient(0deg,#f65612,#3c147b)}
            10%{background-image: linear-gradient(0deg,#f35a19,#401a7f)}
            12.5%{background-image: linear-gradient(0deg,#f05d1f,#442182)}
            15%{background-image: linear-gradient(0deg,#ed6025,#472786)}
            17.5%{background-image: linear-gradient(0deg,#eb632b,#4b2e8a)}
            20%{background-image: linear-gradient(0deg,#e86631,#4f348d)}
            22.5%{background-image: linear-gradient(0deg,#e56937,#523b91)}
            25%{background-image: linear-gradient(0deg,#e26c3e,#564195)}
            27.5%{background-image: linear-gradient(0deg,#df6f44,#5a4898)}
            30%{background-image: linear-gradient(0deg,#dc734a,#5e4e9c)}
            32.5%{background-image: linear-gradient(0deg,#d97650,#6155a0)}
            35%{background-image: linear-gradient(0deg,#d67956,#655ba3)}
            37.5%{background-image: linear-gradient(0deg,#d37c5c,#6962a7)}
            40%{background-image: linear-gradient(0deg,#d07f62,#6c68ab)}
            42.5%{background-image: linear-gradient(0deg,#cd8269,#706fae)}
            45%{background-image: linear-gradient(0deg,#ca856f,#7475b2)}
            47.5%{background-image: linear-gradient(0deg,#c78875,#787cb6)}
            50%{background-image: linear-gradient(0deg,#c58c7b,#7b82b9)}
            52.5%{background-image: linear-gradient(0deg,#c28f81,#7f89bd)}
            55%{background-image: linear-gradient(0deg,#bf9287,#838fc1)}
            57.5%{background-image: linear-gradient(0deg,#bc958e,#8796c4)}
            60%{background-image: linear-gradient(0deg,#b99894,#8a9cc8)}
            62.5%{background-image: linear-gradient(0deg,#b69b9a,#8ea3cc)}
            65%{background-image: linear-gradient(0deg,#b39ea0,#92a9cf)}
            67.5%{background-image: linear-gradient(0deg,#b0a1a6,#95b0d3)}
            70%{background-image: linear-gradient(0deg,#ada5ac,#99b6d7)}
            72.5%{background-image: linear-gradient(0deg,#aaa8b2,#9dbdda)}
            75%{background-image: linear-gradient(0deg,#a7abb9,#a1c3de)}
            77.5%{background-image: linear-gradient(0deg,#a4aebf,#a4cae2)}
            80%{background-image: linear-gradient(0deg,#a1b1c5,#a8d0e5)}
            82.5%{background-image: linear-gradient(0deg,#9fb4cb,#acd7e9)}
            85%{background-image: linear-gradient(0deg,#9cb7d1,#afdded)}
            87.5%{background-image: linear-gradient(0deg,#99bad7,#b3e4f0)}
            90%{background-image: linear-gradient(0deg,#96bede,#b7eaf4)}
            92.5%{background-image: linear-gradient(0deg,#93c1e4,#bbf1f8)}
            95%{background-image: linear-gradient(0deg,#90c4ea,#bef7fb)}
            97.5%{background-image: linear-gradient(0deg,#8dc7f0,#c2feff)}
            100%{background-image: linear-gradient(0deg,#8dc7f0,#c2feff)}
        }
        @keyframes gradientNightToSunset {
            0%{background-image: linear-gradient(0deg,#061e56,#155466)}
            2.5%{background-image: linear-gradient(0deg,#171f55,#185266)}
            5%{background-image: linear-gradient(0deg,#222054,#1a5167)}
            7.5%{background-image: linear-gradient(0deg,#2b2252,#1c4f67)}
            10%{background-image: linear-gradient(0deg,#332351,#1e4d67)}
            12.5%{background-image: linear-gradient(0deg,#3a2450,#204c68)}
            15%{background-image: linear-gradient(0deg,#41264f,#224a68)}
            17.5%{background-image: linear-gradient(0deg,#47274e,#234868)}
            20%{background-image: linear-gradient(0deg,#4d284c,#244668)}
            22.5%{background-image: linear-gradient(0deg,#53294b,#264569)}
            25%{background-image: linear-gradient(0deg,#592b4a,#274369)}
            27.5%{background-image: linear-gradient(0deg,#5f2c48,#284169)}
            30%{background-image: linear-gradient(0deg,#652d47,#29406a)}
            32.5%{background-image: linear-gradient(0deg,#6b2e46,#2a3e6a)}
            35%{background-image: linear-gradient(0deg,#703044,#2b3c6a)}
            37.5%{background-image: linear-gradient(0deg,#763143,#2b3a6a)}
            40%{background-image: linear-gradient(0deg,#7c3242,#2c386b)}
            42.5%{background-image: linear-gradient(0deg,#813340,#2d376b)}
            45%{background-image: linear-gradient(0deg,#87343f,#2d356b)}
            47.5%{background-image: linear-gradient(0deg,#8d363d,#2e336b)}
            50%{background-image: linear-gradient(0deg,#92373b,#2e316c)}
            52.5%{background-image: linear-gradient(0deg,#98383a,#2f2f6c)}
            55%{background-image: linear-gradient(0deg,#9d3938,#2f2d6c)}
            57.5%{background-image: linear-gradient(0deg,#a33a36,#2f2b6c)}
            60%{background-image: linear-gradient(0deg,#a93c35,#30296d)}
            62.5%{background-image: linear-gradient(0deg,#ae3d33,#30276d)}
            65%{background-image: linear-gradient(0deg,#b43e31,#30256d)}
            67.5%{background-image: linear-gradient(0deg,#ba3f2f,#30236d)}
            70%{background-image: linear-gradient(0deg,#bf402d,#30216e)}
            72.5%{background-image: linear-gradient(0deg,#c5422a,#311f6e)}
            75%{background-image: linear-gradient(0deg,#cb4328,#311d6e)}
            77.5%{background-image: linear-gradient(0deg,#d04425,#311a6e)}
            80%{background-image: linear-gradient(0deg,#d64523,#31186f)}
            82.5%{background-image: linear-gradient(0deg,#dc4620,#31156f)}
            85%{background-image: linear-gradient(0deg,#e2471c,#31126f)}
            87.5%{background-image: linear-gradient(0deg,#e84819,#310f6f)}
            90%{background-image: linear-gradient(0deg,#ed4a14,#310c6f)}
            92.5%{background-image: linear-gradient(0deg,#f34b0f,#300870)}
            95%{background-image: linear-gradient(0deg,#f94c08,#300470)}
            97.5%{background-image: linear-gradient(0deg,#ff4d00,#300070)}
            100%{background-image: linear-gradient(0deg,#ff4d00,#300070)}
        }
        @keyframes gradientSunsetToNight {
            0%{background-image: linear-gradient(0deg,#ff4d00,#300070)}
            2.5%{background-image: linear-gradient(0deg,#f94c08,#300470)}
            5%{background-image: linear-gradient(0deg,#f34b0f,#300870)}
            7.5%{background-image: linear-gradient(0deg,#ed4a14,#310c6f)}
            10%{background-image: linear-gradient(0deg,#e84819,#310f6f)}
            12.5%{background-image: linear-gradient(0deg,#e2471c,#31126f)}
            15%{background-image: linear-gradient(0deg,#dc4620,#31156f)}
            17.5%{background-image: linear-gradient(0deg,#d64523,#31186f)}
            20%{background-image: linear-gradient(0deg,#d04425,#311a6e)}
            22.5%{background-image: linear-gradient(0deg,#cb4328,#311d6e)}
            25%{background-image: linear-gradient(0deg,#c5422a,#311f6e)}
            27.5%{background-image: linear-gradient(0deg,#bf402d,#30216e)}
            30%{background-image: linear-gradient(0deg,#ba3f2f,#30236d)}
            32.5%{background-image: linear-gradient(0deg,#b43e31,#30256d)}
            35%{background-image: linear-gradient(0deg,#ae3d33,#30276d)}
            37.5%{background-image: linear-gradient(0deg,#a93c35,#30296d)}
            40%{background-image: linear-gradient(0deg,#a33a36,#2f2b6c)}
            42.5%{background-image: linear-gradient(0deg,#9d3938,#2f2d6c)}
            45%{background-image: linear-gradient(0deg,#98383a,#2f2f6c)}
            47.5%{background-image: linear-gradient(0deg,#92373b,#2e316c)}
            50%{background-image: linear-gradient(0deg,#8d363d,#2e336b)}
            52.5%{background-image: linear-gradient(0deg,#87343f,#2d356b)}
            55%{background-image: linear-gradient(0deg,#813340,#2d376b)}
            57.5%{background-image: linear-gradient(0deg,#7c3242,#2c386b)}
            60%{background-image: linear-gradient(0deg,#763143,#2b3a6a)}
            62.5%{background-image: linear-gradient(0deg,#703044,#2b3c6a)}
            65%{background-image: linear-gradient(0deg,#6b2e46,#2a3e6a)}
            67.5%{background-image: linear-gradient(0deg,#652d47,#29406a)}
            70%{background-image: linear-gradient(0deg,#5f2c48,#284169)}
            72.5%{background-image: linear-gradient(0deg,#592b4a,#274369)}
            75%{background-image: linear-gradient(0deg,#53294b,#264569)}
            77.5%{background-image: linear-gradient(0deg,#4d284c,#244668)}
            80%{background-image: linear-gradient(0deg,#47274e,#234868)}
            82.5%{background-image: linear-gradient(0deg,#41264f,#224a68)}
            85%{background-image: linear-gradient(0deg,#3a2450,#204c68)}
            87.5%{background-image: linear-gradient(0deg,#332351,#1e4d67)}
            90%{background-image: linear-gradient(0deg,#2b2252,#1c4f67)}
            92.5%{background-image: linear-gradient(0deg,#222054,#1a5167)}
            95%{background-image: linear-gradient(0deg,#171f55,#185266)}
            97.5%{background-image: linear-gradient(0deg,#061e56,#155466)}
            100%{background-image: linear-gradient(0deg,#061e56,#155466)}
        }

        section .wave{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url("{{asset('storage/assets/wave.png')}}");
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
        var pressed = false;
        var card1Flipped = false;
        var card2Flipped = false;
        $(document).ready(function(){
            // flip card toggle
            $('.flip-card-inner').on('click', function(){
                //$(this).toggleClass('flipped');

                // Check if the clicked element has class 'card1'
                if ($(this).hasClass('card1')) {
                    $(this).toggleClass('flipped'); // Flip card 1
                    card1Flipped = !card1Flipped;
                    if(card1Flipped && card2Flipped){
                        card2Flipped = !card2Flipped;
                        $('.card2').toggleClass('flipped'); // Flip card 2
                        $('.moon').removeClass('moon-moveup').addClass('moon-movedown');
                        $('.sun').removeClass('sun-moveup sun-movedowncard2 sun-moveupcard2').addClass('sun-movedown');
                        $('.maincontainer').removeClass('background-SunsetToDay background-DayToSunset background-DayToNight background-NightToDay background-NightToSunset background-SunsetToNight').addClass('background-NightToSunset');
                        pressed = true;

                    }
                    else{
                        if(pressed){
                            $('.sun').removeClass('sun-movedown sun-movedowncard2 sun-moveupcard2').addClass('sun-moveup');
                            $('.maincontainer').removeClass('background-SunsetToDay background-DayToSunset background-DayToNight background-NightToDay background-NightToSunset background-SunsetToNight').addClass('background-SunsetToDay');
                            pressed = false;
                        } else {
                            $('.sun').removeClass('sun-moveup sun-movedowncard2 sun-moveupcard2').addClass('sun-movedown');
                            $('.maincontainer').removeClass('background-SunsetToDay background-DayToSunset background-DayToNight background-NightToDay background-NightToSunset background-SunsetToNight').addClass('background-DayToSunset');
                            pressed = true;
                        }
                    }

                }
                // Check if the clicked element has class 'card2'
                else if ($(this).hasClass('card2')) {
                    $(this).toggleClass('flipped'); // Flip card 2
                    card2Flipped = !card2Flipped;
                    if(card1Flipped && card2Flipped){
                        card1Flipped = !card1Flipped;
                        $('.card1').toggleClass('flipped'); // Flip card 1
                        $('.moon').removeClass('moon-movedown').addClass('moon-moveup');
                        $('.sun').removeClass('sun-movedowncard2 sun-moveup sun-movedown').addClass('sun-moveupcard2');
                        $('.maincontainer').removeClass('background-SunsetToDay background-DayToSunset background-DayToNight background-NightToDay background-NightToSunset background-SunsetToNight').addClass('background-SunsetToNight');
                        pressed = true;
                    }
                    else{
                        if(pressed){
                            $('.moon').removeClass('moon-moveup').addClass('moon-movedown');
                            $('.sun').removeClass('sun-moveupcard2 sun-moveup sun-movedown').addClass('sun-movedowncard2');
                            $('.maincontainer').removeClass('background-SunsetToDay background-DayToSunset background-DayToNight background-NightToDay background-NightToSunset background-SunsetToNight').addClass('background-DayToNight');
                            pressed = false;
                        }
                        else {
                            $('.moon').removeClass('moon-movedown').addClass('moon-moveup');
                            $('.sun').removeClass('sun-movedowncard2 sun-moveup sun-movedown').addClass('sun-moveupcard2');
                            $('.maincontainer').removeClass('background-SunsetToDay background-DayToSunset background-DayToNight background-NightToDay background-NightToSunset background-SunsetToNight').addClass('background-NightToDay');
                            pressed = true;
                        }
                    }
                }
            });
        });
    </script>
@endsection

@section('content')
    <section aria-label="Section Index Page's Navigation" class="d-flex justify-content-center align-items-center w-100 h-100 maincontainer">
        <article class="card-holder d-flex justify-content-evenly align-items-center flex-row w-75 h-75">
            {{--            Symbol Number Page--}}
            <div class="card-body h-75 justify-content-center d-flex align-items-center">
                <div class="flip-card-inner card1">
                    <div class="flip-card-front justify-content-center d-flex align-items-center">
                        <img src="{{asset('storage/assets/SVG/card1.svg')}}" draggable="false" class="selectDisable"/>
                    </div>
                    <div class="flip-card-back justify-content-center d-flex align-items-center">
                        <div class="card d-flex justify-content-center flex-column align-items-center">
                            <img src="storage/assets/SVG/card1back.svg" draggable="false" class="selectDisable"/>
                            <a href="{{route('symbolPage')}}" class="btn-go btn-card1"><button>Let's Play!</button></a>
                        </div>
                    </div>
                </div>
            </div>
            {{--            completion 10 page--}}
            <div class="card-body h-75 justify-content-center d-flex align-items-center">
                <div class="flip-card-inner card2">
                    <div class="flip-card-front justify-content-center d-flex align-items-center">
                        <img src="storage/assets/SVG/card2.svg" draggable="false" class="selectDisable"/>
                    </div>
                    <div class="flip-card-back justify-content-center d-flex align-items-center">
                        <div class="card d-flex justify-content-center flex-column align-items-center">
                            <img src="storage/assets/SVG/card2back.svg" draggable="false" class="selectDisable"/>
                            <a href="{{route('completionPage')}}" class="btn-go btn-card2"><button>Let's Play!</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="bg-gradient"></article>
        <section id="bg-animation">
            <!--<div class="cloud">
                <img src="storage/assets/cloud1.svg" alt="Cloud Background">
            </div>-->
            <div class="wave wave2"></div>
            <div class="wave wave1"></div>
            <div class="wave wave3"></div>
            <div class="moon">
                <img src="storage/assets/moon.svg" alt="Moon Background">
            </div>
            <div class="sun">
                <img src="storage/assets/sun.svg" alt="Sun Background">
            </div>
        </section>
    </section>

@endsection
