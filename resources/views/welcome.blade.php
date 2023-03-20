<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @import url(https://fonts.googleapis.com/css?family=Raleway:600);

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #EA2E49;
        }

        h1 {
            color: #fff;
            font-family: 'Raleway', sans-serif;
            font-size: 52px;
            font-weight: 600;
            text-transform: uppercase;

            span {
                display: inline-block;
                opacity: 0;
                transform: translateY(20px) rotate(90deg);
                transform-origin: left;
                animation: in 1s forwards;

                /* @for $i from 1 to 8 {
                    &:nth-child(#{$i}) {
                        animation-delay: $i * 0.1s;
                    }
                } */
            }


        }

        @keyframes in {
            0% {
                opacity: 0;
                transform: translateY(50px) rotate(90deg);
            }

            100% {
                opacity: 1;
                transform: translateY(0) rotate(0);
            }
        }
    </style>
</head>

<body class="antialiased">
    <h1>
        <span>w</span>
        <span>e</span>
        <span>l</span>
        <span>c</span>
        <span>o</span>
        <span>m</span>
        <span>e</span>
    </h1>
</body>

</html>
