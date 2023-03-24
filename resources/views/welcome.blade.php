<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgb(200, 200, 253);
        }

        h1 {
            color: #fff;
            font-family: 'Raleway', sans-serif;
            font-size: 52px;
            font-weight: 600;
            text-transform: uppercase;
            display: block;
        }

        span {
            display: inline-block;
            opacity: 0;
            transform: translateY(20px) rotate(90deg);
            transform-origin: left;
            animation: in 1s forwards;

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

        .button {
            width: 140px;
            height: 45px;
            font-family: 'Roboto', sans-serif;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #5f5f5f;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        
        }


        .button.accept-btn:hover {
            background-color: #88c4ee;
            box-shadow: 0px 15px 20px rgba(116, 161, 219, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
    </style>
</head>

<body>
    <div class="antialiased d-block">
        <h1>
            <span>w</span>
            <span>e</span>
            <span>l</span>
            <span>c</span>
            <span>o</span>
            <span>m</span>
            <span>e</span>
        </h1>
    </div>
    
    <x-button ref="{{ route('posts.index') }}" class="button accept-btn mt-3 d-flex align-items-center justify-content-center" onclick="addAnimation2()"> Go.. </x-button>

</body>

</html>
