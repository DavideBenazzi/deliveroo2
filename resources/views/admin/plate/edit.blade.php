@extends('layouts.main')

@section('content')

    <div class="container" 
        style="background-color: #1d170d;">
        <h1 class="pt-3 pb-3 text-center">Edite your dish</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.plate.update' , $plate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

                <div class="form-group">
                    <label for="name">Dish Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ old('name' , $plate->name) }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description"> {{ old('description', $plate->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $plate->price) }}">
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    @isset($plate->photo)
                        <div class="wrap-image">
                            <img width="200" src="{{asset('storage/' . $plate->photo)}}" alt="{{$plate->name}}">
                        </div>
                    @endisset
                    <input class="form-control" type="file" name="photo" id="photo"  placeholder="{{old('photo', $plate->photo)}}" accept="photo/*">
                </div>

                <div class="form-group">
                    <label for="allergenic">Allerginic</label>
                    <input class="form-control" type="text" name="allergenic" id="allergenic" value="{{ old('allergenic', $plate->allergenic) }}">
                </div>

                <div class="form-group">
                    <label for="ingredients">Ingredients</label>
                    <input class="form-control" type="text" name="ingredients" id="ingredients" value="{{ old('ingredients', $plate->ingredients) }}">
                </div>

                <div class="form-group">
                    <p>Visibility:</p>
                    <input type="radio" id="1" name="visibility" value="1">
                    <label for="1">Yes</label><br>
                    <input type="radio" id="0" name="visibility" value="0">
                    <label for="0">No</label><br>
                </div>

                <div class="form-group d-flex justify-content-center pt-3 ">
                    <input class="btn btn-warning" type="submit" value="Add">
                </div>


                <a href="{{route('admin.plate.index')}}">Ritorno Lista </a>
            </form>
        </div>
@endsection
