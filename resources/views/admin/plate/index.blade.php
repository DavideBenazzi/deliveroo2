@extends('layouts.main')

@section('content')
    <h1>MENU</h1>

    <div class="">
        <a href="{{ route('admin.plate.create') }}">Crea il tuo piatto</a>
    </div>
@endsection
