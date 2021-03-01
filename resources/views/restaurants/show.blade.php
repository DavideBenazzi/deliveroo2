@extends('layouts.main')
@section('content')
<div class="soloColore" style="background-color: #1d170d;">
<h1>{{ $restaurant->nameRestaurant}}</h1>

    {{-- Istanza Vue --}}
    <section id='app'>
        {{-- Elenco dei piatti --}}
        @foreach ($plate as $item)
            <h1>{{ $item->name}}</h1>
            <input type="checkbox" v-on:change="" id="{{$item->id}}" value="{{$item->name}}" v-model="checkedPlate">
            <label for="{{$item->id}}">{{ $item->name }}</label>
            <img src="{{ asset('storage/' . $item->photo ) }}" alt="{{ $item->name }}">
        @endforeach
        <ul>
            <h1>Orders</h1>
            <li v-for="plate in checkedPlate">
                <h3>@{{ plate }}</h3>
            </li>
        </ul>
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

                <div class="form-group">
                    <ul>
                        <label for="order">Order</label>
                        <li v-for="(plate , index) in checkedPlate">
                            <input class="form-control" type="text" :name="index" id="order" :value="plate">
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
