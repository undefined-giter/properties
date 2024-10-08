<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $option = new Option();

        return view('admin.options.form', [
            'option' => $option,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a été ajouté');
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
        $option = Option::find($id);

        if (!$option) {
            return redirect()->route('admin.option.index')->with('error', 'Option not found.');
        }

        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, string $id)
    {
        $option = Option::find($id);

        if (!$option) {
            return redirect()->route('admin.option.index')->with('error', 'Option non trouvée.');
        }

        $option->update($request->validated());

        return to_route('admin.option.index')->with('success', 'L\'option a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = Option::find($id);

        if (!$option) {
            return redirect()->route('admin.option.index')->with('error', 'Option non trouvée.');
        }

        $option->delete();

        return redirect()->route('admin.option.index')->with('success', 'Option supprimée avec succès.');
    }
}
