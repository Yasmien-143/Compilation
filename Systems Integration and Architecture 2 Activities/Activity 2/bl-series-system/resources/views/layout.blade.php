<!DOCTYPE html>
<html>
<head>
    <title>Thailand BL Series List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #cce7ff, #e6f2ff);
            font-family: 'Segoe UI', sans-serif;
        }

        /* Glass effect with gray container */
        .glass {
            background: rgba(220, 220, 220, 0.85); /* light gray container */
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
        }

        /* Cards for each series: azure1 background */
        .card {
            background-color: #F0FFFF; /* azure1 */
            border: none;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        /* Header */
        .navbar {
            background: linear-gradient(90deg, #66b3ff, #3399ff);
            color: #fff;
            font-weight: bold;
        }

        .navbar-brand {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand i {
            color: #ffe6f0;
            font-size: 1.8rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(90deg, #3399ff, #66b3ff);
            color: white;
            padding: 15px 0;
            text-align: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            font-weight: 500;
        }

        footer i {
            color: #ffe6f0;
            margin-left: 5px;
        }

        /* Search box */
        input[type="text"] {
            border-radius: 50px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark shadow-lg">
    <div class="container">
        <span class="navbar-brand">
            <i class="fa-solid fa-film"></i> BL Series Gallery
        </span>
    </div>
</nav>

<div class="container mt-4 glass">
    @yield('content')
</div>

<footer>
     Made with Love for BL Fans <i class="fa-solid fa-heart"></i> | 2026 BL Series System
</footer>

</body>
</html>