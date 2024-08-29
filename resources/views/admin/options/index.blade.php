@extends('admin.adminLayout')

@section('pageTitle', 'Les Options')

@section('h1', 'Toutes Les Options')

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
            <button class="btn btn-primary mr-12 ml-auto -mt-6" 
                onclick="window.location='{{ route('admin.option.create') }}'">
                Ajouter une option
            </button>
        </div>
        <table class="mx-auto bg-grey border">
            <thead class="bg-gray-100">
                <tr class="ml-12">
                    <th class="thCustoms">Nom de l'option</th>
                    <th class="thCustoms text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($options as $option)
                    <tr class="{{ $option->sold ? 'bg-red-100' : '' }}">
                        <td class="tdCustoms">{{ $option->name }}</td>
                        <td class="tdCustoms flex justify-end">
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
        {{ $options->links() }}
    </div>
@endsection