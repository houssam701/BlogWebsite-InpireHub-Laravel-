<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('signup.css') }}">
    <title>Sign up page</title>
    <link rel="icon" href="/storage/images/inspirhub_logo.png" type="image/x-icon">

</head>
<body>
<div class="container2">
    <h1>InspireHub</h1>
    <form action="/resetPassword" method="POST">
        @csrf
        <h2>Reset Your Password</h2>
        <input type="text" name="token" value="{{$token}}" hidden>

        <input type="email" placeholder="Enter your email" name="email" required>
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
        <button type="submit">Submit</button>
    </form>
    
</div>
</body>
</html>