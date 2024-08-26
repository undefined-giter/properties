@extends('admin.adminLayout')

@section('pageTitle', $property->exists ? 'Éditer Ce Bien' : 'Ajouter Un Bien')
@section('h1', $property->exists ? 'Éditer Ce Bien' : 'Ajouter Un Nouveau Bien')

@section('content')

<div class="flex justify-center m-4">
    <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method='post' class="vstack gap-2" style="max-width: 1200px">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Titre de l\'annonce', 'name' => 'title', 'value' => $property->title])
            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface])
                <div class="relative flex items-center col">
                    @include('shared.input', ['class' => 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
                    <span class="absolute right-5 mt-6 text-gray-500">€</span>
                </div>
            </div>
        </div>
        @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'label' => 'Description', 'name' => 'description', 'value' => $property->description])
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
            @include('shared.input', ['class' => 'col', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
            @include('shared.input', ['class' => 'col', 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Étage', 'name' => 'floor', 'value' => $property->floor])
        </div>
        <div class="text-right">
            @include('shared.checkbox', ['class' => 'mt-3', 'label' => 'Cochez la case si la propriété a été vendue :', 'name' => 'sold', 'value' => $property->exists ? $property->sold : false])
        </div>

        <div class="flex">
            <button class="btn btn-primary m-auto mt-2">
                {{ $property->exists ? 'Modifier Le Bien' : 'Ajouter Le Bien' }}
            </button>
        </div>
    </form>
</div>

@endsection