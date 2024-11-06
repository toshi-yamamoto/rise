@extends('layouts.app')

@section('title', 'ショップ一覧')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
    <div class="mt-4">
        <div class="row">
            @foreach ($restaurants as $restaurant)
                <div class="card col-md-4 mb-4" style="width: 18rem;">
                    <img src="{{ asset($restaurant->image_url) }}" class="card-img-top" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">#{{ $restaurant->region->name }} #{{ $restaurant->genre->name }}</p>
                        <a href="{{ route('restaurants.detail', ['id' => $restaurant->id]) }}" class="btn btn-primary">詳しくみる</a>

                        <button class="favorite-btn btn btn-link" data-restaurant-id="{{ $restaurant->id }}">
                            <i class="heart-icon {{ auth()->user() && auth()->user()->favorites->contains($restaurant->id) ? 'filled' : '' }}">heart-icon</i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
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
