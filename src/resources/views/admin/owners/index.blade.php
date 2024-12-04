@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>店舗代表者一覧</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>Email</th>
                    <th>作成日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($owners as $owner)
                    <tr>
                        <td>{{ $owner->id }}</td>
                        <td>{{ $owner->name }}</td>
                        <td>{{ $owner->email }}</td>
                        <td>{{ $owner->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
