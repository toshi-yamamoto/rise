<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body class="container">
    <header>
        <h1>Header</h1>
    </header>

    <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/menu_icon.png') }}" alt="メニュー" style="width: 30px; height: 30px;">
            Rise
        </a>
    </nav>

    <div>
        @yield('content')
    </div>

    <footer>
        <h1>Footer</h1>
    </footer>

</body>

</html>
