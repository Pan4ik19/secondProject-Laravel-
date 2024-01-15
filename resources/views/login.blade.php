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

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        width: 300px;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h2 {
        color: #007BFF;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        text-align: left;
        margin-bottom: 5px;
    }

    input {
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        padding: 10px;
        background-color: #04AA6D;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .switch {
        margin-top: 15px;
        font-size: 14px;
    }

    .switch a {
        color: #007BFF;
        text-decoration: none;
    }

</style>
