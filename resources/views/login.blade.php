<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login page</title>
    <link rel="icon" href="/storage/images/inspirhub_logo.png" type="image/x-icon">

</head>
<body>
<div class="container">
    <div class="left">
        <h1>InspireHub</h1>
        <p>Connect with friends and the world with InpireHub.</p>
    </div>
    <div class="right">
        <form action="/login" method="POST">  
            @csrf    
            <input type="text" name="username" placeholder="username" value="{{old('username')}}" required> <br>
            @error('username')
            <p style="color: red">{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="Password"><br>
            @error('password')
            <p style="color: red">{{$message}}</p>
            @enderror
            <button type="submit" id="button">Login</button>
        </form>
        <hr style="width:100%;">
        <a href="/signup" id="create">Create New Account</a>
        <a href="/forget" id="forgetPassword">Forget password?</a>

    </div>
</div>
</body>
</html>