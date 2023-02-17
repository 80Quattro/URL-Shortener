<form method="POST" action="/users/authenticate">
    @csrf
    <div>
        <label for="email">Email: </label>
        <input type="text" name="email" value="{{old('email')}}">
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password" value="{{old('password')}}">
    </div>
    <input type="submit" value="Login">
</form>