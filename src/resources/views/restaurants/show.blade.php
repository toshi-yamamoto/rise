@extends('layouts.app')

@section('title', 'ショップ詳細-予約')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
    <div class="container mt-5 d-flex">
        <div class="col-md-6">
            <a href="{{ route('restaurants.index') }}" class="btn btn-primary">&lt; 戻る</a>
            <h3>{{ $restaurants->name }}</h3>
            <img src="{{ asset($restaurants->image_url) }}" class="img-fluid mb-3" alt="{{ $restaurants->name }}">
            <p>#{{ $restaurants->region->name }} #{{ $restaurants->genre->name }}</p>
            <p>{{ $restaurants->description }}</p>
        </div>

        <div class="col-md-6">
            <div class="reservation-box p-4 bg-primary text-white rounded">
                <h5 class="text-center">予約</h5>
                <form action="{{ route('reservations.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{ $restaurants->id }}">
                    <div class="mb-3">
                        <label for="date" class="form-label">日付</label>
                        <input type="date" id="reservation_date" name="reservation_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">時間</label>
                        <input type="time" id="reservation_time" name="reservation_time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="number_of_people" class="form-label">人数</label>
                        <select id="number_of_people" name="number_of_people" class="form-control" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="reservation-summary p-3 bg-info rounded mb-3">
                        <p>Shop: {{ $restaurants->name }}</p>
                        <p>Date: <span id="summary-date"></span></p>
                        <p>Time: <span id="summary-time"></span></p>
                        <p>Number: <span id="summary-number"></span></p>
                    </div>
                    <button type="submit" class="btn btn-light w-100">予約する</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('reservation_date').addEventListener('change', function() {
            document.getElementById('summary-date').textContent = this.value;
        });

        document.getElementById('reservation_time').addEventListener('change', function() {
            document.getElementById('summary-time').textContent = this.value;
        });

        document.getElementById('number_of_people').addEventListener('change', function() {
            document.getElementById('summary-number').textContent = this.value;
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
