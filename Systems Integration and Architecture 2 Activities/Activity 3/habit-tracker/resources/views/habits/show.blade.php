@extends('habits.layout')

@section('content')

<h2>Habit Details</h2>

<p><strong>Name:</strong> {{ $habit->name }}</p>
<p><strong>Category:</strong> {{ $habit->category }}</p>
<p><strong>Start Date:</strong> {{ $habit->start_date }}</p>
<p><strong>Goal:</strong> {{ $habit->goal }}</p>


@php $percent = ($habit->progress / $habit->goal) * 100; @endphp
<div class="progress">
    <div class="bar" style="width:{{ $percent }}%">{{ round($percent) }}%</div>
</div>

<a href="{{ route('habits.edit', $habit->id) }}" class="btn edit">Edit</a>
<a href="{{ route('habits.done', $habit->id) }}" class="btn done">Done</a>

@endsection