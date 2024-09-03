@extends('layout')

@section('pageTitle', 'Bienvenue')

@section('title', 'Venez trouver votre bien !')

@section('content')

    <div class='m-12'>
        <div class="max-w-3xl mx-auto">
            <form method="get" class="container flex m-2">
                <input placeholder="Mot clef" class="form-control m-1" name='title' value="{{ $input['title'] ?? '' }}">
                <input type="number" placeholder="Budget maximum" class="form-control m-1" name='price' value="{{ $input['price'] ?? '' }}">
                <input type="number" placeholder="Surface minimale" class="form-control m-1" name='surface' value="{{ $input['surface'] ?? '' }}">
                <button class="btn btn-primary btn-sm flex-grow-0 m-1">Rechercher</button>
            </form>

            <table class="w-full bg-grey border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="gb_thCustoms" colspan="2">Titre</th> <!-- Colonne du titre qui occupe deux colonnes -->
                        <th class="gb_thCustoms">Surface</th>
                        <th class="gb_thCustoms">Prix</th>
                        <th class="gb_thCustoms">Ville</th>
                        <th class="gb_thCustoms text-right">Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                        <tr class="{{ $property->sold ? 'bg-red-100' : '' }}">
                            <td class="gb_tdCustoms" colspan="2">{{ $property->title }}</td> <!-- Contenu du titre prend aussi deux colonnes -->
                            <td class="gb_tdCustoms">{{ $property->surface }} m²</td>
                            <td class="gb_tdCustoms">{{ number_format($property->price, 0, ',', ' ') }} €</td>
                            <td class="gb_tdCustoms">{{ $property->city }}</td>
                            <td class="gb_tdCustoms text-right">
                                <button onclick="window.location='{{ route('details', ['id' => $property->id]) }}'" 
                                    class="text-2xl inline-block transform transition-transform duration-120 hover:scale-110">
                                    ➡️
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>Pas de propriétés répondant aux critères pour le moment</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

