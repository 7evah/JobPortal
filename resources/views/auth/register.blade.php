<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Job Portal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .jobportal-logo {
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h1 class="jobportal-logo">JobPortal</h1>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mt-4">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mt-4">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mt-4">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a class="text-muted" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
