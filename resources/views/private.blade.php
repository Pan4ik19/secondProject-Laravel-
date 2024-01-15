<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>private</title>
</head>
<body>
    @csrf
    <h1>Private</h1>
    <form method="get" action={{route('user.logout')}}>
        <button name="logout">Exit</button>
    </form>
</body>
</html>
