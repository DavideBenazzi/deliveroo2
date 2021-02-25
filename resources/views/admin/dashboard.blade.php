@extends('layouts.main')

@section('content')
<div class="container" 
    style="background-color: #1d170d;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$user->nameRestaurant}}</h1>
            <h3>Address:{{$user->address}}</h3>
            <h3>Email: {{$user->emailRestaurant}}</h3>
            <h3>Phone:{{$user->phone}}</h3>
            <h3>P.IVA: {{$user->vat}}</h3>
            <a href="{{ route('admin.plate.index') }}">link alla  vista piatti</a><br>
            <a href="">link alla  vista ordini/statistiche</a>
        </div>
        {{-- <div class="types">
            @forelse ($user->types as $type)
                <span class="badge badge-primary"> {{ $type->name }}</span>
            
            @empty  
                <h3>No types</h3>

            @endforelse
        </div> --}}
    </div>
</div>
@endsection
