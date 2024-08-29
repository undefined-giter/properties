@extends('layout')

@section('pageTitle', 'Bienvenue')

@section('title', 'Venez trouver votre bien !')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 mt-8">
        @foreach ($properties as $property)
            @include('shared/cardProperty')
        @endforeach
    </div>

@endsection