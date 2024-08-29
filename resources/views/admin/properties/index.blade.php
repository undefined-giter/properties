@extends('layout')

@section('pageTitle', 'Les Biens')

@section('title', 'Tous Les Biens')

@section('content')

    <div class='m-12'>
        <div class="flex">
            <button class='btn btn-primary mr-12 ml-auto -mt-6' onclick="window.location='{{ route('admin.property.create') }}'">
                Ajouter un bien
            </button>        
        </div>
        <div class="max-w-3xl mx-auto">
            <table class="w-full bg-grey border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="gb_thCustoms">Titre</th>
                        <th class="gb_thCustoms">Surface</th>
                        <th class="gb_thCustoms">Prix</th>
                        <th class="gb_thCustoms">Ville</th>
                        <th class="gb_thCustoms text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                        <tr class="{{ $property->sold ? 'bg-red-100' : '' }}">
                            <td class="gb_tdCustoms">{{ $property->title }}</td>
                            <td class="gb_tdCustoms">{{ $property->surface }} m²</td>
                            <td class="gb_tdCustoms">{{ number_format($property->price, 0, ',', ' ') }} €</td>
                            <td class="gb_tdCustoms">{{ $property->city }}</td>
                            <td class="gb_tdCustoms flex justify-end">
                                <a href="{{ route('admin.property.edit', $property->id) }}" class="text-orange-500 mr-2 text-lg">✏️</a>
                                <form action="{{ route('admin.property.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-lg">❌</button>
                                </form>                            
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
