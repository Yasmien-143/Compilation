@extends('layout')

@section('content')

<h2 class="text-center mb-4"> Explore Thailand BL Series </h2>

<form method="GET" action="/items" class="mb-4">
    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="🔍 Search series...">
</form>

<div id="loading" class="text-center my-4" style="display:none;">
    <div class="spinner-border text-info" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="row" id="series-list">
    @forelse($items as $item)
        <div class="col-md-3 mb-4">
            <div class="card shadow">
                <img src="{{ $item['image'] }}" class="card-img-top" style="height: 240px; object-fit: cover;">
                <div class="card-body text-center">
                    <h6>{{ $item['title'] }}</h6>
                    <small class="text-muted">{{ $item['genre'] }}</small>
                    <br>⭐ {{ $item['rating'] }}
                    <br><br>
                    <a href="/items/{{ $item['id'] }}" class="btn btn-info btn-sm text-white">
                        View Details
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <h4 class="text-danger">❌ No results found!</h4>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center">
    {{ $items->links('pagination::bootstrap-5') }}
</div>

<script>
    const form = document.querySelector('form');
    const loading = document.getElementById('loading');
    const seriesList = document.getElementById('series-list');

    form.addEventListener('submit', () => {
        seriesList.style.display = 'none';
        loading.style.display = 'block';
    });
</script>

@endsection