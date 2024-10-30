@extends('layouts.app')

@section('title', 'ショップ一覧')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="mt-4">
        <div class="row">
            @foreach ($restaurants as $restaurant)
                <div class="card col-md-4 mb-4"style="width: 18rem;">
                    <img src="{{ asset($restaurant->image_url) }}" class="card-img-top" alt="{{ $restaurant->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text">#{{ $restaurant->region->name }} #{{ $restaurant->genre->name }}</p>
                        <a href="{{ route('restaurants.show', ['id' => $restaurant->id]) }}" class="btn btn-primary">詳細を見る</a>
                        <span class="heart-icon float-right">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
