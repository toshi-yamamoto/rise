@extends('layouts.app')

@section('title', 'ショップ一覧')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
    <div class="mt-4">
        <div class="row">
            @forelse ($restaurants as $restaurant)
                <div class="card col-md-4 mb-4" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $restaurant->image_url) }}" class="card-img-top" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">#{{ $restaurant->region->name }} #{{ $restaurant->genre->name }}</p>
                        <a href="{{ route('restaurants.detail', ['id' => $restaurant->id]) }}" class="btn btn-primary">詳しくみる</a>
                        <button class="favorite-btn btn btn-link" data-restaurant-id="{{ $restaurant->id }}">
                            {{-- <i class="heart-icon {{ auth()->user() && auth()->user()->favorites->contains($restaurant->id) ? 'filled' : '' }}">heart-icon</i> --}}
                        <img src="{{ asset(auth()->user() && auth()->user()->favorites->contains($restaurant->id) ? 'images/heart_color.svg' : 'images/heart.svg') }}" class="heart-icon" alt="Favorite">
                    </button>
                    </div>
                </div>
            @empty
                <p>該当するレストランはありません</p>
            @endforelse
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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
                        // icon.addClass('filled');
                        icon.attr('src', '{{ asset('images/heart_color.svg') }}');
                    } else {
                        // icon.removeClass('filled');
                        icon.attr('src', '{{ asset('images/heart.svg') }}');
                    }
                },
                error: function(xhr, status, error) {
                    // console.log("Error callback reached");
                    // console.log(xhr.responseText);
                    alert('お気に入りの登録に失敗しました。ログインが必要です。');
                    window.loacation.href = '{{ route("login") }}'
                }
            });
        });
    </script>
@endsection
