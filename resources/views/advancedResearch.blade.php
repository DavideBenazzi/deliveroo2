@extends('layouts.main')
@section('content')
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
                        <li v-for="restaurant in filteredRestaurants">
                            <a href="">
                                @{{ restaurant.nameRestaurant }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div v-show="activeTypes">
                    <ul>
                        <li v-for='restaurant in secondfilteredRestaurants'>
                            <a href="">
                                @{{ restaurant }}
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- form advanced research type restaurant --}}

                <div v-for="type in types">
                    <input type="checkbox" v-on:change="filterCheckType" :id="type.id" :value="type.id" v-model="checkedType">
                    <label :for="type.id">@{{ type.name }}</label>
                </div>

            </section>
 @endsection
