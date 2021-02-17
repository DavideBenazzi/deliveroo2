@extends('layouts.main')


@section('content')
    <div class="text-center">

        <div class="container">
            <h1 class="pt-4">{{$plate->name}}</h1>

            <p>Description: {{$plate->description}}</p>
            <p>Price: {{$plate->price}}€</p>
            <p>Ingredients: {{$plate->ingredients}}</p>
            <p>Allergenics: {{$plate->allergenic}}</p>
            <p>Added: {{$plate->created_at->diffForHumans()}}</p>

        </div>
    </div>
    <div class="">
        <a href="{{ route('admin.plate.index') }}">Torna al menu</a>
    </div>
@endsection
