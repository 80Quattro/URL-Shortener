<a href="/urls"><code><</code>See all URLs</a>
<br>
<a href="/urls/{{$url['id']}}/edit">Edit</a>
<br>
<form method="POST" action="/urls/{{$url['id']}}">
    @csrf
    @method("DELETE")
    <button>Delete</button>
</form>

<h3>Details</h3>

<table>
    <tr>
        <td>Destination URL</td>
        <td>{{$url['destination_url']}}</td>
    </tr>
    <tr>
        <td>URL Key</td>
        <td>{{$url['url_key']}}</td>
    </tr>
    <tr>
        <td>Short URL</td>
        <td>{{$url['default_short_url']}}</td>
    </tr>
    <tr>
        <td>Created at</td>
        <td>{{$url['created_at']}}</td>
    </tr>
    <tr>
        <td>Updated at</td>
        <td>{{$url['updated_at']}}</td>
    </tr>
    <tr>
        <td>Track visits</td>
        <td>
            @if($url['track_visits'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track IP Address</td>
        <td>
            @if($url['track_ip_address'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track Operating System</td>
        <td>
            @if($url['track_operating_system'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track OS vesion</td>
        <td>
            @if($url['track_operating_system_version'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track Browser</td>
        <td>
            @if($url['track_browser'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track Browser version</td>
        <td>
            @if($url['track_browser_version'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track Referer URL</td>
        <td>
            @if($url['track_referer_url'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
    <tr>
        <td>Track Device Type</td>
        <td>
            @if($url['track_device_type'] == true)
                yes
            @else
                no
            @endif
        </td>
    </tr>
</table>

<h3>Statistics</h3>

@unless (count($visits) == 0)

<p>This page is visited {{count($visits)}} times.</p>

<table>
    <thead>
        <tr>
            <th>IP Address</th>
            <th>Operating System</th>
            <th>OS version</th>
            <th>Browser</th>
            <th>Browser version</th>
            <th>Device type</th>
            <th>Visited at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($visits as $visit)
            <tr>
                <td>{{$visit['ip_address']}}</td>
                <td>{{$visit['operating_system']}}</td>
                <td>{{$visit['operating_system_version']}}</td>
                <td>{{$visit['browser']}}</td>
                <td>{{$visit['browser_version']}}</td>
                <td>{{$visit['device_type']}}</td>
                <td>{{$visit['visited_at']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    There are no visits yet.
@endunless