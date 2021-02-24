@extends('layouts.main')
@section('content')

<section id="app">
    <div>
        <button>
                 <a href="{{ route('advancedResearch') }}">advancedResearch</a>
        </button>
    </div>
    <h2>Our Type</h2>
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
                @{{ restaurant.nameRestaurant }}
            </li>
        </ul>
    </div>

    

</section>

    
@endsection

            
