@extends('layouts.app')

@section('content')
    <h1>管理者ダッシュボード</h1>
    <a href="{{ route('admin.owners') }}" class="btn btn-primary">店舗代表者一覧</a>
@endsection
