@extends('layouts.main')
@section('content')
<div class="soloColore" style="background-color: #1d170d;">
<h1>{{ $restaurant->nameRestaurant}}</h1>

    {{-- Istanza Vue --}}
    <section id='app' style="background-color: #000">
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
            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')   
                
                <ul>
                    <h1>Carrello</h1>
                    {{-- <li v-for="plate in orderedPlates">
                        <h3>@{{ plate.name }}</h3>
                    </li> --}}
                </ul>
                <div class="form-group">
                    <ul>
                        <li v-for="(plate , index) in orderedPlates">
                            <label :for="plate.name">Order</label>
                            <input class="form-control" type="text" name="plateName[]" :id="plate.name" :value="plate.name">
                            <input class="form-control" type="number" name="quantity[]" :id="plate.name" value="0">
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
</div>
@endsection
