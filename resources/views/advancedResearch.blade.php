@extends('layouts.main')
@section('content')
            <section id="app"
                style="background-color: #1d170d;">
                <h2>Advanced Research</h2>
                {{-- search name restaurant --}}
                <div class="cerca">
                    <input style="background-color: #1d170d;" type="search" @keyup.enter="nameSearch" v-model="nameRestaurant" placeholder="Inserisci il nome del ristorante" name="" value="">
                </div>
                {{-- print name restaurant that have search parameters --}}
                <div v-show="nameActive">
                    <ul>
                        <li v-for="restaurants in finalNameSearch">
                            <a :href="advrouting(restaurants.user_id)">
                                @{{ restaurants.nameRestaurant }}
                            </a>
                        </li>
                    </ul>
                </div>


                {{-- form advanced research type restaurant --}}

                <div v-for="type in types">
                    <input type="checkbox" v-on:change="filterCheckType" :id="type.id" :value="type.id" v-model="checkedType">
                    <label :for="type.id">@{{ type.name }}</label>
                </div>
                {{-- print name restaurant that have all categories checked --}}
                <div v-show="typesActive">
                    <ul>
                        <li v-for='restaurants in finalFiltered'>
                            <a :href="advrouting(restaurants.user_id)">
                                @{{ restaurants.nameRestaurant }}
                            </a>
                        </li>
                    </ul>
                </div>

            </section>
 @endsection
