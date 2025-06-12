<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <header>
            HEADER

            @isset($_SESSION['user'])
                <strong>{{ $_SESSION['user']->name }}</strong>
                <a href="{{ route('auth/logout') }}">Logout</a>
            @endisset
        </header>

        @yield('content')

        <footer>
            FOOTER
        </footer>
    </div>
</body>

</html>
