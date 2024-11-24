@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Danh mục: {{ $category->Name }}</h3>
    <div class="product-list d-flex flex-wrap">
        @forelse($products as $product)
        <div class="col-md-3 mb-4">
        <div class="card h-100">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button class="btn btn-success w-100">Mua ngay</button>
                    
                </form>
            </div>
        </div>
    </div>
        @empty
            <p>Không có sản phẩm nào trong danh mục này.</p>
        @endforelse
    </div>
</div>
@endsection

