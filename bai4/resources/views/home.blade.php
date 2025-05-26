@extends('layout')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div>
        @foreach ($products as $product)
            <div>
                Tên sản phẩm:
                <a href="{{ APP_URL . 'product/' . $product->id }}">
                    {{ $product->name }}
                </a>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
