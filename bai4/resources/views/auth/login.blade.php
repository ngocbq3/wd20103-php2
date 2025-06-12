<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="width: 500px">
        <h1>Đăng nhập</h1>
        @isset($errors)
            <div class="alert alert-danger">{{ $errors['auth'] }}</div>
        @endisset
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" value="{{ $email ?? '' }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('auth/register') }}">Register</a>
            </div>
        </form>
    </div>
</body>

</html>
