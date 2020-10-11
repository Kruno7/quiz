<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            ul li {
                font-size: 18px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="https://www.sum.ba/logo.png" height="60px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    @auth
                <li class="nav-item active">

                    <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                    @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                    @endif
                @endauth
                @endif
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2 style="text-align: center; margin-top: 10px;">Dobro do&scaron;li na stranicu Sveu&ccaron;ilista u Mostar-u</h2>
        <div class="row row-cols-1 row-cols-md-2 mt-4">
            <div class="col mb-4">
                <div class="card">
                    <img src="https://031info.rs/wp-content/uploads/2019/08/Informatika-kao-temelj-dana%C5%A1njeg-dru%C5%A1tva.jpg" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title">INFORMATIKA</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSmgMTtJes1jwfuoaa9TxOJBkH-J7sQXeZ6hw&usqp=CAU" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title">MATEMATIKA</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://i.radiopachone.org/img/5cb52e3f133a47c6fca1575ede0d37.jpg" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title">KEMIJA</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTxNWuR97s8lPif01ip9mpTSKZ4eTHWUw0Lvg&usqp=CAU" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title">TURIZAM I ZASTITA OKOLISA</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
