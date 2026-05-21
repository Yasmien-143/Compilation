<!DOCTYPE html>
<html>
<head>
    <title>Gym Membership Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background: #111827;
            border: none;
            border-radius: 15px;
        }

        label, .title, .subtitle {
            color: #3cb2d6;
        }
        .title {
             font-weight: bold;
             font-size: 28px;
}

       
        .subtitle {
            color: #3cb2d6;
        }

        .form-control, .form-select {
            background: #1f2937;
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: #d1dbd1;
        }

        .form-select option {
            color: white; /* dropdown options visible */
        }

        .form-control:focus, .form-select:focus {
            background: #1f2937;
            color: white;
            box-shadow: 0 0 0 2px #22c55e;
        }

        .btn-custom {
            background: linear-gradient(90deg, #22c55e, #16a34a);
            border: none;
            font-weight: bold;
            letter-spacing: 1px;
            color: white;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #16a34a, #15803d);
        }

        .alert-success {
            color: white;
            background-color: #16a34a;
            border: none;
        }

        .alert-danger {
            color: white;
            background-color: #dc2626;
            border: none;
        }

        small.text-danger {
            color: #fca5a5 !important;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">

        <div class="card p-4 shadow-lg">

            <div class="text-center mb-4">
                <div class="title">🏋️Gym Membership Registration🏋️</div>
                <div class="subtitle">Transform Your Body. Elevate Your Life.</div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/form">
                @csrf

                <div class="mb-3">
                    <label>Member Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter full name" value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="09123456789" value="{{ old('phone') }}">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" value="{{ old('age') }}">
                    @error('age') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Membership Plan</label>
                    <select name="plan" class="form-select">
                        <option value="">Select Plan</option>
                        <option value="Basic">Basic</option>
                        <option value="Premium">Premium</option>
                        <option value="VIP">VIP</option>
                    </select>
                    @error('plan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Workout Schedule</label>
                    <select name="schedule" class="form-select">
                        <option value="">Select Schedule</option>
                        <option value="Morning">Morning</option>
                        <option value="Afternoon">Afternoon</option>
                        <option value="Evening">Evening</option>
                    </select>
                    @error('schedule') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label>Fitness Goal</label>
                    <select name="goal_category" class="form-select">
                        <option value="">Select Goal</option>
                        <option value="Weight Loss">Weight Loss</option>
                        <option value="Muscle Gain">Muscle Gain</option>
                        <option value="Endurance">Endurance</option>
                        <option value="Flexibility">Flexibility</option>
                    </select>
                    @error('goal_category') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-custom w-100 mt-3">
                    JOIN NOW 🚀
                </button>

            </form>

        </div>

    </div>
</div>

</body>
</html>