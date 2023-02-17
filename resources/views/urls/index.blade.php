@unless(count($urls) == 0)

<table>
    <thead>
        <tr>
            <th>Short URL</th>
            <th>Destination URL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($urls as $url)
            <tr>
                <td>{{$url['default_short_url']}}</td>
                <td>{{$url['destination_url']}}</td>
                <td><a href="/urls/{{$url['id']}}">Details</a></td>
                <td><a href="/urls/{{$url['id']}}/edit">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@else

You have no URLs yet.

@endunless