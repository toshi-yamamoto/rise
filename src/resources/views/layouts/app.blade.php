
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body class="container">

    <nav class="navbar">
        <a class="navbar-brand" href="{{ route('menu') }}">
            <img src="{{ asset('images/menu_icon.png') }}" alt="Menu Icon" style="width: 30px; height: 30px;">
        </a>
        <h3 class="m-0 flex-grow-1 text-primary">Rise</h3>

        @if(Route::currentRouteName() === 'restaurants.index')
        <form action="{{ route('restaurants.index') }}" method="GET" class="search-form">
            @csrf
            <div class="search-container position-relative ms-n3">
                <!-- エリアの選択 -->
                <select name="region" id="region">
                    <option value="">All Areas</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ request('region') == $region->id ? 'selected' : '' }}>{{ $region->name }}
                        </option>
                    @endforeach
                </select>
                <!-- ジャンルの選択 -->
                <select name="genre" id="genre">
                    <option value="">All genres</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : ''}}>{{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                <!-- キーワード入力 -->
                <input type="text" name="keyword" placeholder="Search...." value="{{ request('keyword') }}">
                <!--検索ボタン-->
                <button type="submit">Search</button>
            </div>
        </form>
        @endif
    </nav>

    <div>
        @yield('content')
    </div>

</body>

</html>
