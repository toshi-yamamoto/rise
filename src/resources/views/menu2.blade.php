<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
</head>
<body>
    <div class="container">
        <a href="{{ route('restaurants.index') }}">Home</a>
        <a href="{{ route('register') }}">Registration</a>
        <a href="{{ route('login') }}">Login</a>
    </div>
</body>
</html>
