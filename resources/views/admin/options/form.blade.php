@extends('admin.adminLayout')

@section('pageTitle', $option->exists ? 'Éditer Cette option' : 'Ajouter Une Option')
@section('h1', $option->exists ? 'Éditer Cette Option' : 'Ajouter Une Nouvelle Option')

@section('content')

<div class="flex justify-center m-4">
    <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method='post' class="vstack gap-2" style="max-width: 1200px">
        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', ['type' => 'text', 'label' => 'Nom', 'name' => 'name', 'value' => $option->name])

        <div class="flex">
            <button class="btn btn-primary m-auto mt-2">
                {{ $option->exists ? 'Modifier L\'Option' : 'Ajouter L\'Option' }}
            </button>
        </div>
    </form>
</div>

@endsection