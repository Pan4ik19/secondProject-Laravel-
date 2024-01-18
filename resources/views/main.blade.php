<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="{{asset('js/app.js')}}" defer></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>private</title>
</head>
<body>
<h1>Main</h1>
<div id="main">
    <post-add-category-component></post-add-category-component><br><br>
    <post-add-entry-component></post-add-entry-component>
    <create-entries-table-component></create-entries-table-component>
</div>
<br><br>
<form method="get" action={{route('user.logout')}}>
    <button class="btn" name="logout">
        <span class="text">Exit</span>
    </button>
</form>
</body>
</html>


