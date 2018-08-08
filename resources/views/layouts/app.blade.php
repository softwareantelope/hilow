<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>High/Low Guessing Game</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #cards {
                border: 1px inset red;
                width: 35em;
                border: 1px inset blue;
                padding: 3em;
                margin: 1em 6em 1em 6em;
            }
            form.question {
                display: inline-block;
            }
            form.question button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 0.5rem 0.5rem;
                margin: 0.5em;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 2rem;
            }
            .large {
                font-size: large;
                font-weight: bold;
                padding: 0.5rem;
                margin: 1rem;
                border: 2px solid green;
            }
            .larger {
                font-size: larger;
                font-weight: bold;
                padding: 1rem;
                margin: 1rem;
                border: 2px solid green;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
