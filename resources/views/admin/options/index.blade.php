@extends('layout')

@section('pageTitle', 'Les Options')

@section('title', 'Toutes Les Options')

@section('content')

    <div class='m-12'>
        <div class="flex">
            <button class="btn btn-primary mr-12 ml-auto -mt-6" 
                onclick="window.location='{{ route('admin.option.create') }}'">
                Ajouter une option
            </button>
        </div>
        <table class="mx-auto bg-grey border">
            <thead class="bg-gray-100">
                <tr class="ml-12">
                    <th class="gb_thCustoms">Nom de l'option</th>
                    <th class="gb_thCustoms text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($options as $option)
                    <tr class="{{ $option->sold ? 'bg-red-100' : '' }}">
                        <td class="gb_tdCustoms">{{ $option->name }}</td>
                        <td class="gb_tdCustoms flex justify-end">
                            <a href="{{ route('admin.option.edit', $option->id) }}" class="text-orange-500 mr-2 text-lg">✏️</a>
                            <form action="{{ route('admin.option.destroy', $option->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette option ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 text-lg">❌</button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection