<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Models\ShortURL;
use AshAllenDesign\ShortURL\Facades\ShortURL as ShortURLFacade;

class URLController extends Controller
{
    // Show all URL's
    public function index()
    {
        return view('url.index', ['urls' => ShortURL::all()]);
    }

    // Show single URL
    public function show($id)
    {
        return view('url.show', ['url' => ShortURL::find($id)]);
    }

    // Show Create URL Form
    public function create()
    {
        return view('url.create');
    }

    // Store URL Data
    public function store(Request $request)
    {
        $request->validate([
            'destination_url' => 'required'
        ]);
        
        $destinationURL = $request->input('destination_url');
        $shortURLObject = ShortURLFacade::destinationUrl($destinationURL)->make();
        $shortURLObject->save();
        return redirect('/');
    }
}
