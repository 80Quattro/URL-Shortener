<form method="POST" action="/urls">
    @csrf
    <input type="text" name="destination_url" />
    <input type="submit" value="Add">
</form>