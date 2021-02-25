@extends('layouts.main')


@section('content')
    <div  style="background-color: #1d170d;">
        <div class="text-center">

            <div class="container">
                <h1 class="pt-4">{{$plate->name}}</h1>
                @if (!empty($plate->photo))
                    <img class="mb-3" width="400" src="{{asset('storage/' . $plate->photo)}}" alt="{{$plate->name}}">
                @else
                    <img class="mb-3" width="400" src="{{asset('img/no-image.png')}}" alt="{{$plate->name}}">
                @endif
                <p>Description: {{$plate->description}}</p>
                <p>Price: {{$plate->price}}€</p>
                <p>Ingredients: {{$plate->ingredients}}</p>
                <p>Allergenics: {{$plate->allergenic}}</p>
                <p>Added: {{$plate->created_at->diffForHumans()}}</p>

            </div>
        </div>
        <div class="form-group container d-flex ">
            <a class="btn btn-warning " href="{{route('admin.plate.edit', $plate->id)}}">Edit</a>

            <form  action="{{route('admin.plate.destroy', $plate->id)}}" method="POST">
                @csrf
                @method("DELETE")

                    <input class="btn btn-danger ml-4  mr-5 " type="submit" value="Delete" >
            </form>

                <a class="btn btn-warning" href="{{ route('admin.plate.index') }}">Torna al menu</a>
        </div>
    </div>
@endsection
