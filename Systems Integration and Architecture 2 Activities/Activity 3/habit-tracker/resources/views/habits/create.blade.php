@extends('habits.layout')

@section('content')

<div style="max-width:1200px; margin:40px auto; font-family:'Segoe UI', sans-serif; padding:15px;">

    <!-- HEADER -->
    <div style="background:linear-gradient(135deg,#6c5ce7,#f1a3a3); color:white; padding:25px; border-radius:15px; text-align:center; box-shadow:0 5px 20px rgba(160, 84, 84, 0.2);">
        <h1 style="margin:0;"> HabitFlow Dashboard</h1>
        <p style="margin:5px 0 0 0;">Track. Improve. Succeed.</p>
    </div>

    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:25px;">

        <!-- LEFT: FORM -->
        <div style="flex:1 1 320px;">

            <div style="backdrop-filter:blur(10px); background:rgba(139, 209, 171, 0.8); padding:20px; border-radius:15px; box-shadow:0 4px 15px rgba(0,0,0,0.1);">

                <h3 style="color:#6c5ce7;">➕ Add New Habit</h3>

                @if(session('success'))
                    <p style="color:green;">{{ session('success') }}</p>
                @endif

                <form action="{{ route('habits.store') }}" method="POST">
                    @csrf

                    <input type="text" name="name" placeholder="Habit Name" required
                        style="width:100%; padding:12px; margin:10px 0; border-radius:8px; border:1px solid #f1a3a3;">

                    <select name="category" required
                        style="width:100%; padding:12px; margin:10px 0; border-radius:8px; border:1px solid #f1a3a3;">
                        <option disabled selected>Select Category</option>
                        <option>Health</option>
                        <option>Fitness</option>
                        <option>Study</option>
                        <option>Productivity</option>
                        <option>Hobby</option>
                        <option>Other</option>
                    </select>

                    <input type="number" name="goal" placeholder="Goal"
                        style="width:100%; padding:12px; margin:10px 0; border-radius:8px; border:1px solid #f1a3a3;">

                    <input type="date" name="start_date"
                        style="width:100%; padding:12px; margin:10px 0; border-radius:8px; border:1px solid #f1a3a3;">

                    <button style="width:100%; padding:12px; background:#6c5ce7; color:white; border:none; border-radius:8px; cursor:pointer; font-weight:bold; transition:0.3s;"
                            onmouseover="this.style.transform='scale(1.05)'; this.style.background='#0f0b55'"
                            onmouseout="this.style.transform='scale(1)'; this.style.background='#050220'">
                        Save Habit
                    </button>
                </form>

            </div>

        </div>

        <!-- RIGHT: HABITS -->
        <div style="flex:2 1 600px;">

            <h3 style="color:#0984e3;">📋 Your Habits ({{ $habits->total() }})</h3>

            <!-- SEARCH -->
            <form method="GET" action="{{ route('habits.create') }}" style="margin-bottom:15px;">
                <input type="text" name="search" placeholder="Search Habit..." value="{{ $search ?? '' }}"
                    style="padding:10px; width:60%; border-radius:8px; border:1px solid #f1a3a3;">
                <button type="submit"
                        style="padding:10px 15px; background:#0984e3; color:white; border:none; border-radius:8px; cursor:pointer; transition:0.3s;"
                        onmouseover="this.style.background='#3660e7'"
                        onmouseout="this.style.background='#411edb'">
                    Search
                </button>
            </form>

            @if($search ?? false)
                <p style="color:#d63031; font-weight:bold;">Results for: "{{ $search }}"</p>
            @endif

            <!-- HABIT CARDS -->
            @foreach($habits as $habit)
                @php
                    $percent = ($habit->goal>0)? ($habit->progress/$habit->goal)*100 : 0;
                    $color = $percent < 50 ? '#831010' : ($percent < 100 ? '#fdcb6e' : '#6a9618');
                @endphp

                <div style="background:linear-gradient(135deg,#ffffff,#f1f2f6); padding:18px; margin:12px 0; border-radius:15px; box-shadow:0 5px 15px rgba(0,0,0,0.1); transition:0.3s;"
                     onmouseover="this.style.transform='translateY(-5px) scale(1.02)'"
                     onmouseout="this.style.transform='translateY(0) scale(1)'">

                    <h4 style="margin:0; color:#6c5ce7;">{{ $habit->name }}</h4>
                    <small style="color:#636e72;">{{ $habit->category }}</small>

                    <p style="margin:8px 0;">Progress: {{ $habit->progress }} / {{ $habit->goal }}</p>

                    <!-- PROGRESS BAR -->
                    <div style="background:#dfe6e9; border-radius:10px; overflow:hidden;">
                        <div style="width:{{ $percent }}%; background:{{ $color }}; padding:5px 0; text-align:center; color:white; font-size:12px;">
                            {{ round($percent) }}%
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div style="margin-top:12px; display:flex; gap:5px;">
                        <a href="{{ route('habits.edit', $habit->id) }}"
                           style="flex:1; text-align:center; background:#0984e3; color:white; padding:6px; border-radius:6px; text-decoration:none; transition:0.2s;"
                           onmouseover="this.style.background='#74b9ff'"
                           onmouseout="this.style.background='#0984e3'">
                            Edit
                        </a>

                        <form action="{{ route('habits.destroy', $habit->id) }}" method="POST" style="flex:1;">
                            @csrf
                            @method('DELETE')
                            <button style="width:100%; background:#d63031; color:white; padding:6px; border:none; border-radius:6px; cursor:pointer; transition:0.2s;"
                                    onclick="return confirm('Delete this habit?')"
                                    onmouseover="this.style.background='#e17055'"
                                    onmouseout="this.style.background='#d63031'">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('habits.done', $habit->id) }}"
                           style="flex:1; text-align:center; background:#00b894; color:white; padding:6px; border-radius:6px; text-decoration:none; transition:0.2s;"
                           onclick="return confirm('Mark as done?')"
                           onmouseover="this.style.background='#55efc4'"
                           onmouseout="this.style.background='#00b894'">
                            Done
                        </a>
                    </div>

                </div>
            @endforeach

            <!-- PAGINATION -->
            <div style="margin-top:20px;">
                {{ $habits->links() }}
            </div>

        </div>

    </div>

</div>

@endsection