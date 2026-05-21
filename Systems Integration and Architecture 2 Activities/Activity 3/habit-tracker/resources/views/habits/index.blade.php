@extends('habits.layout')

@section('content')

<h2>📋 Habit List</h2>

<form>
    <input type="text" name="search" placeholder="Search..." value="{{ $search }}">
    <button>Search</button>
</form>

<a href="{{ route('habits.create') }}" class="btn add">+ Add Habit</a>

@foreach($habits as $habit)
<div class="card">
    <h3>{{ $habit->name }}</h3>
    <p>Category: {{ $habit->category }}</p>
    <p>Start Date: {{ $habit->start_date }}</p>

    <!-- Progress Bar -->
    @php
        $percent = ($habit->progress / $habit->goal) * 100;
    @endphp
    <div class="progress">
        <div class="bar" style="width:{{ $percent }}%">{{ round($percent) }}%</div>
    </div>
    <p>Progress: {{ $habit->progress }} / {{ $habit->goal }}</p>

    <a href="{{ route('habits.edit', $habit->id) }}" class="btn edit">Edit</a>
    <a href="{{ route('habits.done', $habit->id) }}" class="btn done" onclick="return confirm('Mark this habit as done?')">Done</a>

    <form action="{{ route('habits.destroy', $habit->id) }}" method="POST" style="display:inline;">
        @csrf @method('DELETE')
        <button class="btn delete">Delete</button>
    </form>
</div>
@endforeach

{{ $habits->links() }}

@endsection