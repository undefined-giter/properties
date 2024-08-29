@extends('admin.adminLayout')

@section('pageTitle', 'Les Biens')

@section('h1', 'Tous Les Biens')

@section('content')
<style>
.thCustoms {
    padding: 0.75rem 1.5rem;
    font-size: 0.75rem;
    font-weight: 500;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-left: 3em !important;
}
.tdCustoms {
    max-width: 250px;
    padding: 0.75rem 1.5rem;
    font-size: 0.75rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

    <div class='m-12'>
        <div class="flex">
            <button class='btn btn-primary mr-12 ml-auto -mt-6' onclick="window.location='{{ route('admin.property.create') }}'">
                Ajouter un bien
            </button>        
        </div>
        <table class="mx-auto bg-grey border">
            <thead class="bg-gray-100">
                <tr class="ml-12">
                    <th class="thCustoms">Titre</th>
                    <th class="thCustoms">Surface</th>
                    <th class="thCustoms">Prix</th>
                    <th class="thCustoms">Ville</th>
                    <th class="thCustoms text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                    <tr class="{{ $property->sold ? 'bg-red-100' : '' }}">
                        <td class="tdCustoms">{{ $property->title }}</td>
                        <td class="tdCustoms">{{ $property->surface }} m²</td>
                        <td class="tdCustoms">{{ number_format($property->price, thousands_separator: ' ') }} €</td>
                        <td class="tdCustoms">{{ $property->city }}</td>
                        <td class="tdCustoms flex justify-end">
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
        {{ $properties->links() }}
    </div>
@endsection