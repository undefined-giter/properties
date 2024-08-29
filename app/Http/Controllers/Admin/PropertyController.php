<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    protected $nbOfPropertyToDisplay = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate($this->nbOfPropertyToDisplay)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'title' => 'Appartement ',
            'surface' => 35,
            'price' => 180000,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 2,
            'city' => 'Lyon',
            'address',
            'postal_code' => 69000,
            'sold' => false,
        ]);

        $options = Option::orderBy('name')->get();

        return view('admin.properties.form', [
            'property' => $property,
            'options' => $options,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        $property->options()->sync($request->input('options', []));
        return to_route('admin.property.index')->with('success', 'Le bien a été ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::find($id);
        $options = Option::orderBy('name')->get();

        if (!$property) {
            return redirect()->route('admin.property.index')->with('error', 'Le bien n\'a pas été trouvé');
        }

        return view('admin.properties.form', [
            'property' => $property,
            'options' => $options,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, string $id)
    {
        $property = Property::find($id);

        if (!$property) {
            return redirect()->route('admin.property.index')->with('error', 'Le bien n\'a pas été trouvé');
        }

        $property->update($request->validated());
        $property->options()->sync($request->input('options', []));

        return to_route('admin.property.index')->with('success', 'Le bien a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::find($id);

        if (!$property) {
            return redirect()->route('admin.property.index')->with('error', 'Le bien n\'a pas été trouvé');
        }

        $property->delete();

        return redirect()->route('admin.property.index')->with('success', 'Propriété supprimée avec succès.');
    }
}
