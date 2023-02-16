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
    public function show(ShortURL $url)
    {
        return view('url.show', ['url' => $url, 'visits' => $url->visits]);
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

    // Show Update URL Form
    public function edit(ShortURL $url)
    {
        return view('url.edit', ['url' => $url]);
    }

    // Update URL
    public function update(Request $request, ShortURL $url)
    {
        $formFields = $request->validate([
            'destination_url' => 'required'
        ]);

        $url->update($formFields);

        return redirect("/urls/" . $url->id);
    }

    // Delete URL
    public function destroy(ShortURL $url)
    {
        $url->delete();
        return redirect('/urls');
    }
}
