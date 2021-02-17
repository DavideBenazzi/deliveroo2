@extends('layouts.main')

@section('content')
    <h1 class="text-center pt-3 pb-3">Menu</h1>
    <ul class="container text-center">
        @foreach ($plates as $plate)
            <li class="list-unstyled list-group-item pt-5 pb-5">
                {{-- <div>
                    @if (!empty($plate->photo))
                        <img class="mb-3" width="250" src="{{asset('storage/' . $plate->photo)}}" alt="{{$plate->name}}">
                    @else
                        <img class="mb-3" width="250" src="{{asset('img/no-img.png')}}" alt="{{$beer->title}}">
                    @endif
                </div> --}}
                <div>
                    <h5>Name: {{$plate->name}}</h5>
                    <p>Availability: {{$plate->visibility}}</p>

                </div>

               {{-- Rotta per lo show --}}
                <div class="d-flex justify-content-center">
                    <div class="form-group mr-2 ml-3">
                        <a class="text-decoration-none btn btn-primary" href="{{route('admin.plate.show', $plate->id)}}" role="button">Dettaglio</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="">
        <a href="{{ route('admin.plate.create') }}">Crea il tuo piatto</a>
    </div>
    <div class="">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </div>
@endsection
