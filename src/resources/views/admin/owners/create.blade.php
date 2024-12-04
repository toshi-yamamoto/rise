@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>店舗代表者の作成</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.owners.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">名前</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">店舗代表者を作成</button>
        </form>
    </div>
@endsection
