@extends('layouts.app')

@section('title', 'ショップ作成')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

<form action="{{ route('owners.restaurants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name"> Restaurant Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="region_id"> Area:</label>
    <select name="region_id" id="region_id" required>
        @foreach($regions as $region)
            <option value="{{ $region->id }}">{{ $region->name }}</option>
        @endforeach
    </select>

    <label for="genre_id"> Genre:</label>
    <select name="genre_id" id="genre_id" required>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <label for="description"> Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="image"> Image:</label>
    <input type="file" name="image" id="image" accept="image/*">

    <button type="submit">Save</button>
</form>
@endsection
