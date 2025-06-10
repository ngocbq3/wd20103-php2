@extends('admin.app')
@section('title')
    Thêm sản phẩm
@endsection

@section('content')
    <div class="container w-80">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product['name'] }}">
                @isset($errors['name'])
                    <span class="text-danger">{{ $errors['name'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="category_id" id="" class="form-control">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="price" step="0.1" class="form-control" value="{{ $product['price'] }}">
                @isset($errors['price'])
                    <span class="text-danger">{{ $errors['price'] }}</span>
                @endisset
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $product['stock'] }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('admin/products') }}" class="btn btn-primary">List</a>
            </div>
        </form>
    </div>
@endsection
