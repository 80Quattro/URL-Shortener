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
        return view('urls.index', ['urls' => ShortURL::all()]);
    }

    // Show single URL
    public function show(ShortURL $url)
    {
        return view('urls.show', ['url' => $url, 'visits' => $url->visits]);
    }

    // Show Create URL Form
    public function create()
    {
        return view('urls.create');
    }

    // Store URL Data
    public function store(Request $request)
    {
        $request->validate([
            'destination_url' => ['required', 'url']
        ]);

        $destinationURL = $request->input('destination_url');
        $shortURLObject = ShortURLFacade::destinationUrl($destinationURL)
            ->trackVisits(filter_var($request->input('track_visits'), FILTER_VALIDATE_BOOLEAN))
            ->trackIPAddress(filter_var($request->input('track_ip_address'), FILTER_VALIDATE_BOOLEAN))
            ->trackOperatingSystem(filter_var($request->input('track_operating_system'), FILTER_VALIDATE_BOOLEAN))
            ->trackOperatingSystemVersion(filter_var($request->input('track_operating_system_version'), FILTER_VALIDATE_BOOLEAN))
            ->trackBrowser(filter_var($request->input('track_browser'), FILTER_VALIDATE_BOOLEAN))
            ->trackBrowserVersion(filter_var($request->input('track_browser_version'), FILTER_VALIDATE_BOOLEAN))
            ->trackRefererURL(filter_var($request->input('track_referer_url'), FILTER_VALIDATE_BOOLEAN))
            ->trackDeviceType(filter_var($request->input('track_device_type'), FILTER_VALIDATE_BOOLEAN))
            ->make();
        $shortURLObject->save();
        return redirect('/urls');
    }

    // Show Update URL Form
    public function edit(ShortURL $url)
    {
        return view('urls.edit', ['url' => $url]);
    }

    // Update URL
    public function update(Request $request, ShortURL $url)
    {
        $formFields = $request->validate([
            'destination_url' => ['required', 'url']
        ]);

        $url->track_visits = filter_var($request->input('track_visits'), FILTER_VALIDATE_BOOLEAN);
        $url->track_ip_address = filter_var($request->input('track_ip_address'), FILTER_VALIDATE_BOOLEAN);
        $url->track_operating_system = filter_var($request->input('track_operating_system'), FILTER_VALIDATE_BOOLEAN);
        $url->track_operating_system_version = filter_var($request->input('track_operating_system_version'), FILTER_VALIDATE_BOOLEAN);
        $url->track_browser = filter_var($request->input('track_browser'), FILTER_VALIDATE_BOOLEAN);
        $url->track_browser_version = filter_var($request->input('track_browser_version'), FILTER_VALIDATE_BOOLEAN);
        $url->track_referer_url = filter_var($request->input('track_referer_url'), FILTER_VALIDATE_BOOLEAN);
        $url->track_device_type = filter_var($request->input('track_device_type'), FILTER_VALIDATE_BOOLEAN);

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
