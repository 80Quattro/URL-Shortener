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

    public function create()
    {
        return view('url.create');
    }

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
