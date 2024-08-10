<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Manager</title>
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])

</head>
{{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>  --}}
{{--  <script src="https://kit.fontawesome.com/43e8462adf.js" crossorigin="anonymous"></script>  --}}
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Financial Manager</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transactions.index') }}">Transacciones</a>
                </li>
            </ul>
        </div>
    </nav>
    @if (session('status'))
    <div class="alert alert-success bg-white custom-container  dark:bg-gray-800 text-blue shadow">
        {{session('status')}}
    </div>
    @endif

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
