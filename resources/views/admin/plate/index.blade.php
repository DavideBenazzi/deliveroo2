@extends('layouts.main')

@section('content')
    <div class="main-section sfondo-auth">
        <h1 class="text-center mt-4 mb-5">Menu</h1>
        <div class="ml-7 mb-5">
            <p>if you want to add a new dish to your menu,
                <a class="link-add"href="{{route('admin.plate.create')}}">Click Here <i class="fas fa-utensils"></i></a>
            </p>
        </div>
        <ul class="sezione-piatti d-flex wrap">
            @foreach ($plates as $plate)
                <li class="plate list-unstyled mr-3 mb-4">
                        @if (!empty($plate->photo))
                            <img class="mb-3" width="250" src="{{asset('storage/' . $plate->photo)}}" alt="{{$plate->name}}">
                        @else
                            <img class="mb-3" width="250" src="{{asset('img/no-image.png')}}" alt="{{$plate->name}}">
                        @endif

                    <div>
                        <h5>{{$plate->name}}</h5>
                        <h5>{{$plate->price}}€</h5>
                        @if ($plate->visibility == 1)
                            <p>Availability: YES</p>
                        @else
                            <p>Availability: NO</p>
                        @endif


                    </div>

                {{-- Rotta per lo show --}}
                    <div class="d-flex justify-content-center">
                        <div class="form-group mr-2 ml-3">
                            <a class="prime-button text-decoration-none" href="{{route('admin.plate.show', $plate->id)}}" role="button">Detail</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
    </div>
@endsection
