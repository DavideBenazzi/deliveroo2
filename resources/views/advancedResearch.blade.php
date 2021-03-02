@extends('layouts.main')
@section('content')
            <div class="advanced-search-jumbo" 
            style="background-image: url('{{ asset('./img/jumbo_edit.png')}}');">
                
            <div class="container d-flex flex-col">
                <div class="advanced-search">
                    <h3>Advanced Research</h3>

                    {{-- search name restaurant --}}
                    <div class="cerca d-flex just-center">
                        <input class="over-992" style="background-color: #1d170d;" type="search" @keyup.enter="nameSearch" v-model="nameRestaurant" placeholder="Insert restaurant's name you are searching for" name="" value="">
                    </div>
                    <div class="cerca d-flex just-center">
                        <input class="under-992" style="background-color: #1d170d;" type="search" @keyup.enter="nameSearch" v-model="nameRestaurant" placeholder="Insert restaurant's name" name="" value="">
                    </div>
      
                    {{-- form advanced research type restaurant --}}
                    {{-- custom checkbox --}}
                    {{-- <label class="c-custom-checkbox">
                        <input type="checkbox"/>
                        <svg width="31" height="31" viewBox="-4 -4 39 39" aria-hidden="false" focusable="false">
                            <!-- The background -->
                            <rect class="cb-bg" width="50" height="50" x="-2" y="-2" stroke="#e1804f" fill="none" stroke-width="3"
                                rx="6" ry="6"></rect>
                            <!-- The checkmark-->
                            <polyline class="cb-cm" points="4,14 12,23 28,5" stroke="transparent" stroke-width="4" fill="none"></polyline>
                        </svg>
                        <span>feed</span>
                    </label> --}}

                    <h6>Or select one ore more categories to filter the results</h6>

                    <div v-for="type in types" class="type-item">
                        <input type="checkbox" v-on:change="filterCheckType" :id="type.id" :value="type.id" v-model="checkedType">
                        <label :for="type.id">@{{ type.name }}</label>
                    </div>
                </div>

                {{-- LISTE PRINTATE --}}
                <div class="advanced-list">
                    {{-- print name restaurant that have search parameters --}}
                    <div v-show="nameActive">
                        <ul class="ul-nostyle">
                            <li class="advanced-list-item p-relative" v-for="restaurants in finalNameSearch">
                                <a :href="advrouting(restaurants.user_id)">
                                    <h5>
                                        @{{ restaurants.nameRestaurant }}
                                    </h5>
                                </a>
                            </li>
                        </ul>
                    </div>

                     {{-- print name restaurant that have all categories checked --}}
                     <div v-show="typesActive">
                        <ul class="ul-nostyle">
                            <li class="advanced-list-item p-relative"  v-for='restaurants in finalFiltered'>
                                <a :href="advrouting(restaurants.user_id)">
                                    <h5>
                                        @{{ restaurants.nameRestaurant }}
                                    </h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
 @endsection
