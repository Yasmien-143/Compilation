@extends('habits.layout')

@section('content')

<div style="max-width:500px; margin:50px auto; text-align:center;">

    <h2 style="color:#6c5ce7;">✏️ Edit Habit</h2>

    <form action="{{ route('habits.update',$habit->id) }}" method="POST" style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 15px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT')

        <!-- Habit Name -->
        <input type="text" name="name" value="{{ $habit->name }}" placeholder="Habit Name" style="width:100%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #ccc;"><br>

        <!-- Category Dropdown with colors -->
        <select name="category" required style="width:100%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #ccc;">
            @php
                $categories = ['Health' => '#6c5ce7', 'Fitness' => '#00b894', 'Study' => '#0984e3', 'Productivity' => '#fdcb6e', 'Hobby' => '#e17055', 'Other' => '#b2bec3'];
            @endphp
            @foreach($categories as $cat => $color)
                <option value="{{ $cat }}" {{ $habit->category == $cat ? 'selected' : '' }} style="background-color: {{ $color }}; color:white;">{{ $cat }}</option>
            @endforeach
        </select><br>

        <!-- Goal -->
        <input type="number" name="goal" value="{{ $habit->goal }}" placeholder="Goal" style="width:100%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #ccc;"><br>

        <!-- Progress -->
        <label for="progress">Current Progress:</label>
        <input type="number" name="progress" value="{{ $habit->progress }}" style="width:100%; padding:10px; margin:5px 0 10px 0; border-radius:5px; border:1px solid #ccc;"><br>

        <!-- Visual progress bar -->
        @php $percent = ($habit->goal>0)? ($habit->progress/$habit->goal)*100 : 0; @endphp
        <div style="background:#dfe6e9; border-radius:5px; overflow:hidden; margin-bottom:15px;">
            <div style="width:{{ $percent }}%; background:#00b894; color:white; text-align:center; padding:3px 0; font-size:12px;">{{ round($percent) }}%</div>
        </div>

        <!-- Start Date -->
        <input type="date" name="start_date" value="{{ $habit->start_date }}" style="width:100%; padding:10px; margin:10px 0; border-radius:5px; border:1px solid #ccc;"><br>

        <!-- Update Button -->
        <button style="width:100%; padding:10px; background:#0984e3; color:white; border:none; border-radius:5px; cursor:pointer; margin-top:10px;" onmouseover="this.style.background='#74b9ff'" onmouseout="this.style.background='#0984e3'">Update</button>

    </form>

</div>

@endsection