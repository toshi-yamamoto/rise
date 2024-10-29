@extends('layouts.app')

@section('title', '予約完了')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card text-center" style="width: 300px; padding: 20px;">
        <h4 class="card-title">ご予約ありがとうございます</h4>
        <p class="card-text">ご予約が完了しました。</p>
        <a href="{{ route('restaurants.index') }}" class="btn btn-primary">戻る</a>
    </div>
</div>
@endsection
