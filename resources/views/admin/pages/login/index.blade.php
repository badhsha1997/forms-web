<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-login {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-login .checkbox {
            font-weight: 400;
        }

        .form-login .form-floating:focus-within {
            z-index: 2;
        }

        .form-login input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-login input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body>
<main class="form-login">
    <h1 class="h3 text-center mb-3"><a class="text-decoration-none text-dark" href="{{ route('forms.index') }}">{{ config('app.name') }}</a></h1>
    <p class="text-center mb-3">Please login to continue.</p>
    <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" id="email" name="email" type="text" placeholder="Email" value="{{ old('email') }}">
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control mb-0" id="password" name="password" type="password" placeholder="Email">
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="checkbox mb-3">
            <label>
                <input class="form-check-input" name="remember" type="checkbox" @if(old('remember')) checked @endif> Remember Me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
