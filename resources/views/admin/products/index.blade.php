@extends('layouts.admin')

@section('content')
    <h1>Products</h1>
    <div class="btn btn-warning">
        <a href="/" class="home-btn">Home</a>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>

    <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th> <!-- Thêm cột Image -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                    @else
                        <span>No image</span>
                    @endif
                </td> <!-- Hiển thị hình ảnh -->
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

