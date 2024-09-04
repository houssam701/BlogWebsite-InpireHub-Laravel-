<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Sign up page</title>
    <link rel="icon" href="/storage/images/inspirhub_logo.png" type="image/x-icon">

</head>
<body>
<div class="container2">
    <h1>InspireHub</h1>
    <form action="/signup" method="POST">
        @csrf
        <h2>Create a new account</h2>
        <p>It's quick and easy.</p>
        <hr>
        <input type="text" placeholder="Username" name="username" value="{{old('username')}}" required>
        @error('username')
        <p style="color: red">{{$message}}</p>
        @enderror
        <input type="email" placeholder="example@x.com" name="email" value="{{old('email')}}" required>
        @error('email')
        <p style="color: red">{{$message}}</p>
        @enderror
        <input type="password" placeholder="Password" name="password" required>
        @error('password')
        <p style="color: red">{{$message}}</p>
        @enderror
        <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
        @error('password')
        <p style="color: red">{{$message}}</p>
        @enderror
        <button type="submit">Sign up</button>
    </form>
    
</div>
</body>
</html>