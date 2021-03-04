@extends('layouts.main')
@section('content')
    <div class="soloColore" style="background-image: url('{{ asset('./img/oliva_sospesa.jpg')}}')">
        <h1 class="text-center mt-4 mb-4">{{ $restaurant->nameRestaurant}}</h1>
        <div class="text-center">
            <ul class="ul-nostyle">
                <li>
                    <h5>{{ $restaurant->address }}</h5>
                </li>
                <li>
                    <h5>{{ $restaurant->phone }}</h5>
                </li>
                <li>
                    <h5>{{ $restaurant->emailRestaurant }}</h5>
                </li>
            </ul>
        </div>

        {{-- Istanza Vue --}}
        <section id='app' class="sectionPlate">
            {{-- Elenco dei piatti --}}
            <div  class="d-flex just-around wrap">
                @foreach ($plate as $item)
                    <div class="plateBox mb-5">
                        <div class="titlePlateBox">
                            <h3 class="text-center">{{ $item->name}}</h3>
                        </div>
                        <img src="{{ asset('storage/' . $item->photo ) }}" alt="{{ $item->name }}">
                        <div class="plateTextDetail d-flex flex-col just-between">
                            <div>
                                <p><span>Descrizione : </span>{{ $item->description }}</p>
                                <p><span>Allergeni : </span>{{ $item->allergenic }}</p>
                                <p><span>Ingredienti : </span>{{ $item->ingredients }}</p>
                            </div>
                            <div class="text-center">
                                <h3 class="text-center">Prezzo : {{ $item->price}} €</h3>
                                <input type="checkbox" v-on:change="checkChart" id="{{$item->id}}" value="{{$item->id}}" v-model="checkedPlate">
                                <label for="{{$item->id}}">Aggiungi al carrello</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                <form class="container" action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')   
                    
                        <h1 class="mt-5 mb-5">Carrello</h1>
                        {{-- <li v-for="plate in orderedPlates">
                            <h3>@{{ plate.name }}</h3>
                        </li> --}}
                    <div class="form-group">
                        <h3>Order</h3>
                        <ul class="ul-nostyle orderPlate">
                            <li v-for="(plate , index) in orderedPlates" class="d-flex mb-4">
                                <input class="form-control orderStyle orderStyleMaxi" type="text" name="plateName[]" :id="plate.name" :value="plate.name">
                                <input class="form-control orderStyle orderStyleMini ml-2" type="number" name="quantity[]" :id="plate.name" value="0">
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="form-group">
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
                    </div> --}}

                    {{-- <input class="btn btn-success ml-4  mr-5 " type="submit" value="Conferma Ordine" > --}}
    
                    <a  class="prime-button text-decoration-none" href="{{ route('payment')}}">Conferma</a>

                </form>

        </section>
    </div>
@endsection
