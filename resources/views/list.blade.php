@extends('layout')

@section('pageTitle', 'Bienvenue')

@section('title', 'Venez trouver votre bien !')

@section('content')

    <div class='m-12'>
        <div class="max-w-3xl mx-auto">
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
                    @foreach($properties as $property)
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
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $properties->links() }}
            </div>
        </div>
    </div>

@endsection

