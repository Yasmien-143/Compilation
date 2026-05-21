<!DOCTYPE html>
<html>
<head>
    <title>Gym Membership Dashboard</title>
</head>
<body>

<h1>Gym Membership Dashboard System</h1>

<hr>

<h2>User Profile</h2>

<p><strong>Name:</strong> {{ auth()->user()->name }}</p>
<p><strong>Email:</strong> {{ auth()->user()->email }}</p>
<p><strong>Role:</strong> {{ auth()->user()->role }}</p>

<hr>

<h2>Registered Members</h2>

@foreach($users as $user)
    <p>{{ $user->name }} - {{ $user->email }}</p>
@endforeach

<hr>

<h2>Fitness Motivation Posts</h2>

@foreach(array_slice($posts, 0, 5) as $post)
    <h3>{{ $post['title'] }}</h3>
    <p>{{ $post['body'] }}</p>
    <hr>
@endforeach

</body>
</html>