@extends('layouts.main')
@section('content')

{{-- <section id="app"> --}}
    <section class="jumbo-section">
        <div class="main-section container d-flex flex-col just-around">
            {{-- logo section --}}
            <div class="logo-container d-flex just-center">
                <h1 id="logo">
                    D E L I V E R B O O 
                </h1>                      
            </div>

            {{-- our types --}}
            <div>
                <h2 style="text-align:center" class="pb-6">Select a restaurant's type, then choose your favourite one.</h2>

                {{-- types list --}}
                <ul class="type-list-fade d-inline-flex wrap ul-nostyle just-between just-around">
                    <li class="type-item ml-2" v-for="type in types" v-on:click="filterType(type.id)">
                        <h4>@{{ type.name }}</h4>                     
                    </li>
                </ul>
                {{-- restaurants search list --}}
                <div v-show="activeType">
                    <ul class="d-flex wrap">
                        <li v-for="restaurant in filteredRestaurants">
                            <a href="routing(restaurants.user_id)">
                                @{{ restaurant.nameRestaurant }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- link advanced search --}}
            <div>
                <a href="{{ route('advancedResearch') }}">Do you already know the restaurant? Click there and find it.</a>
            </div>
        </div>
    </section>

    

{{-- </section> --}}

    
@endsection

            
