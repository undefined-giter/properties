<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::where('sold', false)
                      ->orderBy('created_at', 'desc')
                      ->limit(4)
                      ->get();

        return view('index', [
            'properties' => $properties
        ]);
    }

    public function list()
    {
        $properties = Property::paginate(15);

        return view('list', [
            'properties' => $properties
        ]);
    }

    public function details(string $id): View | RedirectResponse
    {
        $property = Property::find($id);
        
        if (!$property) {
            return redirect()->route('list')->with('error', 'Le bien n\'a pas été trouvé');
        }

        return view('details', [
            'property' => $property
        ]);
    }
}
