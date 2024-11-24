@extends('layouts.app')

@section('content')
<h1 class="text-center mb-4">Sản Phẩm</h1>
<div class="row">
    @foreach($products as $product)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary mt-auto">Chi tiết</a>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button class="btn btn-success w-100">Thêm vào giỏ</button>
                    
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection


