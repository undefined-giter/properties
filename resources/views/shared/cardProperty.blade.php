<div class="p-6 bg-white shadow-md rounded-lg max-w-2xl mx-auto">
    @if($property->sold)
        <div class="mb-4 mx-12 p-2 bg-red-100 border-x-[10px] border-red-500 text-red-700 rounded-md text-center">
            <p class="font-bold mb-2">Ce bien a été vendu.</p>
            <p>
                Trouvez le vôtre
                <span 
                    onclick="window.location='{{ route('list') }}'" 
                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ml-2">
                    ➡️
                </span>
            </p>
        </div>
    @endif

    <div class="mx-12">
        <h5 class="text-2xl font-semibold text-gray-800 mb-2 text-center break-words">{{ $property->title }}</h5>
    
        <div class="flex space-x-6 text-gray-600 mb-4 justify-center">
            <p>{{ $property->surface }} m²</p>
            <p class="text-lg text-blue-500">{{ number_format($property->price, 0, ',', ' ') }} €</p>
        </div>
    
        <div class="flex space-x-6 text-gray-600 mb-4 justify-center">
            <p>{{ $property->rooms }} Pièces</p>
            <p>{{ $property->bedrooms }} Chambres</p>
            <p>{{ $property->floor == '0' ? 'rez-de-chaussé' : 'Étage ' . $property->floor }}</p>
        </div>
    
        <p class="text-gray-700 leading-relaxed mb-4 text-center break-words">{{ $property->description }}</p>
    
        <div class="text-right">
            <p>{{ $property->city }} - {{ $property->postal_code }}</p>
            <p class="text-gray-500"><small class="text-xs">Mis à jour à </small>{{ $property->updated_at->format('H\h \l\e d/m/y') }}</p>
        </div>
    </div>
</div>
