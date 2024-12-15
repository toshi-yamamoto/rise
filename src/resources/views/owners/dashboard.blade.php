@extends('layouts.app')

@section('title', '店舗代表者ダッシュボード')

@section('content')
    <div class="container">
        <h1>店舗代表者ダッシュボード</h1>

        <!-- 店舗作成ボタン -->
        <a href="{{ route('restaurants.create') }}" class="btn btn-primary mb-3">新しい店舗を作成</a>

        @if ($restaurants->isEmpty())
            <p>現在、管理している店舗はありません。</p>
        @else
            @foreach ($restaurants as $restaurant)
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>{{ $restaurant->name }}</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>エリア:</strong> {{ $restaurant->region->name }}</p>
                        <p><strong>ジャンル:</strong> {{ $restaurant->genre->name }}</p>
                        <p><strong>説明:</strong> {{ $restaurant->description }}</p>
                        <a href="{{ route('owners.restaurants.edit', $restaurant->id) }}" class="btn btn-warning">店舗情報を編集</a>
                    </div>
                    <div class="card-footer">
                        <h3>予約状況</h3>

                        @if ($restaurant->reservations->isEmpty())
                            <p>予約はありません。</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>予約日</th>
                                        <th>予約時間</th>
                                        <th>人数</th>
                                        <th>ユーザー名</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($restaurant->reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->id }}</td>
                                            <td>{{ $reservation->reservation_date }}</td>
                                            <td>{{ $reservation->reservation_time }}</td>
                                            <td>{{ $reservation->number_of_people }}</td>
                                            <td>{{ $reservation->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
