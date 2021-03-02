@extends('layouts.main')

@section('content')
<div class="main-section sfondo-auth">
    <div class="d-flex flex-col dash">
        <div class="name-restaurant d-flex just-center mt-3">
            <h1>{{$user->nameRestaurant}}</h1>
        </div>
            <h3>Address: {{$user->address}}</h3>
            <h3>Email: {{$user->emailRestaurant}}</h3>
            <h3>Phone: {{$user->phone}}</h3>
            <h3>P.IVA: {{$user->vat}}</h3>
            {{-- <h3>Categorie: da capire come metterle</h3> --}}
        <div class="link d-flex just-between">
            <a href="{{ route('admin.plate.index') }}">Go to Menu view <i class="fas fa-utensils"></i></a>
            <a href="">Stats and Order view  <i class="fas fa-chart-line"></i></a>
        </div>

    </div>
        {{-- <div class="types">
            @forelse ($user->types as $type)
                <span class="badge badge-primary"> {{ $type->name }}</span>

            @empty
                <h3>No types</h3>

            @endforelse
        </div> --}}
</div>

@endsection
