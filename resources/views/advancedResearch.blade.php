<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <section id="app">
                <h2>Advanced Research</h2>
                <div class="cerca">
                    <input type="search" @keyup.enter="nameSearch" v-model="nameRestaurant" placeholder="Inserisci il nome del ristorante" name="" value="">
                </div>
                <ul class="d-inline-flex">
                    <li v-for="type in types">
                        <button v-on:click="filterType(type.id)">
                            <h4>@{{ type.name }}</h4>
                        </button>
                    </li>
                </ul>
                <div v-show="activeType">
                    <ul>
                        <li v-for="restaurant in secondfilteredRestaurants">
                            @{{ secondfilteredRestaurants }}
                        </li>
                    </ul>
                </div>

                {{-- form advanced research type restaurant --}}

                <div v-for="type in types">
                    <input type="checkbox" v-on:change="filterCheckType" :id="type.id" :value="type.id" v-model="checkedType">
                    <label :for="type.id">@{{ type.name }}</label>
                </div>

            </section>

        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>