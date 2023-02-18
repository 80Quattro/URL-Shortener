<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortURL;
use App\Classes\ShortURLBuilder;

class URLController extends Controller
{
    // Show all URL's of logged in user
    public function index()
    {
        return view('urls.index', ['urls' => auth()->user()->urls()->get()]);
    }

    // Show single URL
    public function show(ShortURL $url)
    {
        // Make sure that logged in user is owner
        if($url->user_id != auth()->id()) {
            abort(403);
        }

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
        $formFields = $request->validate([
            'destination_url' => ['required', 'url']
        ]);

        $builder = new ShortURLBuilder();
        $builder->destinationUrl($formFields['destination_url'])
            ->userId(auth()->id())
            ->trackVisits(filter_var($request->input('track_visits'), FILTER_VALIDATE_BOOLEAN))
            ->trackIPAddress(filter_var($request->input('track_ip_address'), FILTER_VALIDATE_BOOLEAN))
            ->trackOperatingSystem(filter_var($request->input('track_operating_system'), FILTER_VALIDATE_BOOLEAN))
            ->trackOperatingSystemVersion(filter_var($request->input('track_operating_system_version'), FILTER_VALIDATE_BOOLEAN))
            ->trackBrowser(filter_var($request->input('track_browser'), FILTER_VALIDATE_BOOLEAN))
            ->trackBrowserVersion(filter_var($request->input('track_browser_version'), FILTER_VALIDATE_BOOLEAN))
            ->trackRefererURL(filter_var($request->input('track_referer_url'), FILTER_VALIDATE_BOOLEAN))
            ->trackDeviceType(filter_var($request->input('track_device_type'), FILTER_VALIDATE_BOOLEAN))
            ->make();

        return redirect('/urls');
    }

    // Show Update URL Form
    public function edit(ShortURL $url)
    {
        // Make sure that logged in user is owner
        if($url->user_id != auth()->id()) {
            abort(403);
        }

        return view('urls.edit', ['url' => $url]);
    }

    // Update URL
    public function update(Request $request, ShortURL $url)
    {
        // Make sure that logged in user is owner
        if($url->user_id != auth()->id()) {
            abort(403);
        }

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
        // Make sure that logged in user is owner
        if($url->user_id != auth()->id()) {
            abort(403);
        }

        $url->delete();
        return redirect('/urls');
    }
}
