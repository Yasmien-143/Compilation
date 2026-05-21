@extends('layout')

@section('content')

<div class="card shadow-lg mx-auto" style="max-width: 400px; background-color: #F0FFFF;">
    <img src="{{ $item['image'] }}" class="card-img-top" style="height: 350px; object-fit: cover;">
    <div class="card-body text-center">
        <h3>{{ $item['title'] }}</h3>
        <p><strong>Actors:</strong> {{ $item['actor'] }}</p>
        <p><strong>Year:</strong> {{ $item['year'] }}</p>
        <p><strong>Genre:</strong> {{ $item['genre'] }}</p>
        <p><strong>Rating:</strong> ⭐ {{ $item['rating'] }}</p>
        <a href="/items" class="btn btn-secondary mt-3">⬅ Back to Gallery</a>
    </div>
</div>

@endsection