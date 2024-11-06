@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>{{ auth()->user()->name }}さん</h1>

        <div class="row">
            <div class="col-md-4">
                <h3>予約状況</h3>
                @foreach ($reservations as $reservation)
                    <div class="card mb-4">
                        <div class="card-body bg-primary text-white">
                            <h5>予約{{ $loop->iteration }}</h5>
                            <p>Shop: {{ $reservation->restaurant->name }}</p>
                            <p>Date: {{ $reservation->reservation_date }}</p>
                            <p>Time: {{ $reservation->reservation_time }}</p>
                            <p>Number: {{ $reservation->number_of_people }}人</p>
                            <button class="btn btn-link text-white delete-reservation" data-reservation-id="{{ $reservation->id }}">X</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <h3>お気に入り店舗</h3>
                <div class="row">
                    @foreach ($favorites as $favorite)
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <img src="{{ $favorite->restaurant->image_url }}" class="card-img-top" alt="{{ $favorite->restaurant->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $favorite->restaurant->name }}</h5>
                                    <p class="card-text">#{{ $favorite->restaurant->region->name }} #{{ $favorite->restaurant->genre->name }}</p>
                                    <button class="btn btn-link favorite-btn" data-restaurant-id="{{ $favorite->restaurant->id }}">
                                        <i class="heart-icon filled" >heart-icon</i>
                                    </button>
                                    <a href="{{ route('restaurants.detail', $favorite->restaurant->id) }}" class="btn btn-primary">詳しくみる</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // 予約の削除
        $(document).on('click', '.delete-reservation', function() {
            var reservationId = $(this).data('reservation-id');
            var card = $(this).closest('.card');

            $.ajax({
                url: `/reservations/${reservationId}/delete`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function() {
                    card.remove();
                },
                error: function() {
                    alert('予約の削除に失敗しました');
                }
            });
        });
        // お気に入りの削除
        $(document).on('click', '.favorite-btn', function() {
            var restaurantId = $(this).data('restaurant-id');
            var icon = $(this).find('.heart-icon');

            $.ajax({
                url: `/restaurants/${restaurantId}/favorite`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.added) {
                        icon.addClass('filled');
                    } else {
                        icon.removeClass('filled');
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error callback reached");
                    console.log(xhr.responseText);
                    alert('お気に入りの登録に失敗しました。ログインが必要です。');
                }
            });
        });
    </script>
@endsection
