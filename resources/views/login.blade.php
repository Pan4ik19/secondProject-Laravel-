<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Login Form</h2>
        <form  method="post" action={{route('user.login')}}>
            @csrf
            <label for="username">Username</label>
            <input type="text" id="username" name="email" placeholder="Enter your username">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <button type="submit" >Login</button>
        </form>
        <div class="switch">Don't have an account? <a href="/registration" >Register here</a></div>
    </div>
</div>
</body>
</html>
