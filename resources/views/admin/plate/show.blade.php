@extends('layouts.main')


@section('content')
    <div class="main-section sfondo-auth">
        <div class="show-plate text-center mt-3">

            <h1 class="pt-1">{{$plate->name}}</h1>
            @if (!empty($plate->photo))
                <img class="mb-3" width="400" src="{{asset('storage/' . $plate->photo)}}" alt="{{$plate->name}}">
            @else
                <img class="mb-3" width="400" src="{{asset('img/no-image.png')}}" alt="{{$plate->name}}">
            @endif
            <p>Description: {{$plate->description}}</p>
            <p>Price: {{$plate->price}}€</p>
            <p>Ingredients: {{$plate->ingredients}}</p>
            <p>Allergenics: {{$plate->allergenic}}</p>
            @if ($plate->visibility == 1)
            <p>Availability: YES</p>
            @else
            <p>Availability: NO</p>
            @endif
            <p>Added: {{$plate->created_at->diffForHumans()}}</p>
            <div class="d-flex just-around tre-button">
                <a class="prime-button" href="{{route('admin.plate.edit', $plate->id)}}">Edit</a>

                <form  action="{{route('admin.plate.destroy', $plate->id)}}" method="POST">
                    @csrf
                    @method("DELETE")

                        <input class="prime-button" type="submit" value="Delete" >
                </form>
            </div>
            <div class="link d-flex">
                <a href="{{route('admin.plate.index')}}">Back to MENU <i class="fas fa-utensils"></i></a>
            </div>
        </div>

    </div>
@endsection
