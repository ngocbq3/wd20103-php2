<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
</head>

<body>
    <h1>Trang chủ</h1>
    @foreach ($products as $product)
        <div>
            Tên sản phẩm: {{ $product->name }}
            <hr>
        </div>
    @endforeach
</body>

</html>
