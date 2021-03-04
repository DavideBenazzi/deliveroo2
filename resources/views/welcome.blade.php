@extends('layouts.main')
@section('content')

{{-- <section id="app"> --}}
        <section class="jumbo-section p-relative"
        style="background-image: url('{{ asset('./img/jumbotron.jpg')}}')">
            <section class="blur-mask" v-bind:class="{ blurred: !isActive }">
                <div class="main-section container d-flex flex-col just-around">
                    {{-- logo section --}}
                    <div class="logo-container d-flex just-center align-center flex-col">
                        <h1 id="logo">
                            D E L I V E R
                        </h1>
                        <h1 id="logo">
                            B O O
                        </h1>

                        {{-- ARCED LOGO --}}
                        {{-- <div class="badge">
                            <h1 id="logo">
                                <span id="logo" class="char1">D </span>
                                <span id="logo" class="char2">E </span>
                                <span id="logo" class="char3">L </span>
                                <span id="logo" class="char4">I </span>
                                <span id="logo" class="char5">V </span>
                                <span id="logo" class="char6">E </span>
                                <span id="logo" class="char7">R</span>
                            </h1>
                        </div> --}}

                        {{-- <span class="boo p-relative" style="margin-top:50px; margin-right:10px">
                            <h1 id="logo">B O O</h1>
                        </span> --}}
                    </div>

                    {{-- our types --}}
                    <h2 style="text-align:center" class="pb-3">Select a restaurant's type, then choose your favourite one.</h2>

                    {{-- types list --}}
                    <ul class="type-list-fade d-inline-flex wrap ul-nostyle just-center">
                        <li class="type-item  p-relative" v-for="type in types" v-on:click="filterType(type.id), isActive=false">
                            <h4>@{{ type.name }}</h4>
                        </li>
                    </ul>


                    {{-- link advanced search --}}
                    <div id="advancedSearch-box">
                        <div class="wrapper p-relative">
                            <div class="icon-box">
                                <a href="{{ route('advancedResearch') }}">Do you already know the restaurant? Come here.</a>
                            </div>
                            <div class="hover-icon">
                                <a id="slide-right" href="{{ route('advancedResearch') }}"><i class="fas fa-search"></i> Click there and find it.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <section class="dark-section">
            {{-- restaurants search list --}}
            <transition name="fade">
                <div v-show="activeType" class="dark-container p-absolute z-index-2">
                    <div class="restaurant-list-box p-relative">
                        <button class="p-relative"
                        v-on:click="activeType = false, isActive = true">
                            <h3 class="p-absolute">Back</h3>
                        </button>
                        <ul class="restaurants-list-home d-flex wrap ul-nostyle flex-col">
                            <li v-for="restaurants in filteredRestaurants" class="p-relative">
                                <a :href="routing(restaurants.user_id)">
                                    <h5>
                                        @{{ restaurants.nameRestaurant }}
                                    </h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </transition>
        </section>


{{-- </section> --}}


@endsection


