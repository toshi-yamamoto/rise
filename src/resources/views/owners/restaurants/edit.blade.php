@extends('layouts.app')

@section('title', '店舗情報の編集')

@section('content')
    <div class="container">
        <h1>店舗情報の編集</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('owners.restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">店舗名</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $restaurant->name }}" required>
            </div>

            <div class="form-group">
                <label for="region_id">エリア</label>
                <select name="region_id" id="region_id" class="form-control" required>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ $restaurant->region_id == $region->id ? 'selected' : '' }}>
                            {{ $region->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="genre_id">ジャンル</label>
                <select name="genre_id" id="genre_id" class="form-control" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $restaurant->genre_id == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">説明</label>
                <textarea name="description" id="description" class="form-control" required>{{ $restaurant->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">画像 (オプション)</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($restaurant->image)
                    <p>現在の画像:</p>
                    <img src="{{ asset('storage/' . $restaurant->image) }}" alt="Current Image" class="img-fluid" style="max-width: 200px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
@endsection
