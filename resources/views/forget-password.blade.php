<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <title>Forget Password</title>
    <link rel="icon" href="/storage/images/inspirhub_logo.png" type="image/x-icon">

</head>
<body>
<div class="container">
    <div class="left">
        <h1>InspireHub</h1>
        <p>We will send a link to your email ,use the link to reset your password!</p>
    </div>
    <div class="right">
        <form action="/forgetPassword" method="POST">  
            
            
            
            
            @csrf    
            <h2>Reset Password</h2>
            <input type="email" placeholder="Enter your email" name="email" required>
            @error('email')
            <p style="color: red">{{$message}}</p>
            @enderror
            @if(session()->has('success'))
            <p style="color:rgb(1, 167, 1)">{{session('success')}}</p>
            @endif
            <button type="submit" id="button">Send</button>
        </form>
    </div>
</div>
</body>
</html>