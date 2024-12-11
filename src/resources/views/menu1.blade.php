<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Menu</title>
</head>
<body>
    <div class="d-flex flex-column align-items-center justify-content-center vh-100">
        <a href="{{ route('restaurants.index') }}" class="btn btn-link text-decoration-none fs-4">Home</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none fs-4">Logout</button>
        </form>
        <a href="{{ route('mypage') }}" class="btn btn-link text-decoration-none fs-4">Mypage</a>
    </div>
</body>
</html>
