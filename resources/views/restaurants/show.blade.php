@extends('layouts.main')
@section('content')

<h1>{{ $restaurant->nameRestaurant}}</h1>

    {{-- Istanza Vue --}}
    <section id='app'>
        {{-- Elenco dei piatti --}}
        @foreach ($plate as $item)
            <div>
                <h1>Nome del piatto : {{ $item->name}}</h1>
                <h3>Prezzo : {{ $item->price}} €</h3>
                <img src="{{ asset('storage/' . $item->photo ) }}" alt="{{ $item->name }}">
                <p>Descrizione : {{ $item->description }}</p>
                <p>Allergeni : {{ $item->allergenic }}</p>
                <p>Ingredienti : {{ $item->ingredients }}</p>
                <input type="checkbox" v-on:change="checkChart" id="{{$item->id}}" value="{{$item->id}}" v-model="checkedPlate">
                <label for="{{$item->id}}">Aggiungi al carrello : {{ $item->name }}</label>
            </div>
        @endforeach
        <ul>
            <h1>Carrello</h1>
            <li v-for="plate in orderedPlates">
                <h3>@{{ plate.name }}</h3>
            </li>
        </ul>
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')   

                <div class="form-group">
                    <ul>
                        <label for="order">Order</label>
                        <li v-for="(plate , index) in orderedPlates">
                            <input class="form-control" type="text" :name="index" id="order" :value="plate.name">
                        </li>
                    </ul>
                </div>
        
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                </div>
                
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
                </div>
                
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
                
                <input class="btn btn-success ml-4  mr-5 " type="submit" value="Conferma Ordine" >
        
        
        </form>
    
</section>

@endsection