<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
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
            background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
        }

        .container {
            max-width: 960px;
        }

        .pricing-header {
            max-width: 700px;
        }
    </style>
    @stack('css')
</head>
<body>
<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="{{ route('admin.dashboard.index') }}" class="d-flex align-items-center text-dark text-decoration-none">
                <h1 class="h3">{{ config('app.name') }}</h1>
            </a>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-decoration-none {{ request()->routeIs('admin.dashboard.index') ? 'text-dark' : 'text-secondary' }}" href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                <a class="me-3 py-2 text-decoration-none {{ request()->routeIs('admin.forms.*') ? 'text-dark' : 'text-secondary' }}" href="{{ route('admin.forms.index') }}">Forms</a>
                <form action="{{ route('admin.logout.store') }}" method="POST">
                    @csrf
                    <button class="py-2 btn btn-sm btn-danger" type="submit">Logout</button>
                </form>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>
    $(function () {
        @if (session()->has('success'))
        alert('{{ session()->get('success') }}');
        @endif

        @if (session()->has('error'))
        alert('{{ session()->get('error') }}');
        @endif
    });
</script>
@stack('js')
</body>
</html>
