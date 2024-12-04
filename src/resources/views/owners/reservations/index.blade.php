@extends('layouts.app')

@section('title', '予約一覧')

@section('content')
    <div class="container">
        <h1>予約一覧</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>店舗名</th>
                    <th>予約日</th>
                    <th>予約時間</th>
                    <th>人数</th>
                    <th>ユーザー</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->restaurant->name }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->reservation_time }}</td>
                        <td>{{ $reservation->number_of_people }}</td>
                        <td>{{ $reservation->user->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">予約はありません</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
