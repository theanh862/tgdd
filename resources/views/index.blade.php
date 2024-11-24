@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <!-- Banner quảng cáo -->
    <div class="row mb-4">
        <div class="col">
            <div class="banner-ad">
                <img src="{{ asset('images/banner.jpg') }}" class="img-fluid" alt="Banner quảng cáo">
            </div>
        </div>
    </div>

    <!-- Sản phẩm đã xem -->
<h3>Sản phẩm đã xem</h3>
<div class="recently-viewed-products">
    @forelse($recentlyViewed as $product)
        <div class="product-item">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            <h4>{{ $product->name }}</h4>
            <p>{{ number_format($product->price, 0, ',', '.') }}₫</p>
            <a href="{{ route('products.show', ['slug' => $product->slug ?? 'slug-mac-dinh']) }}" class="btn btn-primary">Xem chi tiết</a>
        </div>
    @empty
        <p>Chưa có sản phẩm nào được xem gần đây.</p>
    @endforelse
</div>

    <!-- Khuyến mãi Online -->
    <div class="promotion-section">
        <h3>Khuyến mãi Online</h3>
        <div class="product-list d-flex flex-wrap">
            @foreach($products as $product)
                <div class="product-item card text-center m-2 p-2" style="width: 150px;">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <h4 class="mt-2">{{ $product->name }}</h4>
                    <p>{{ number_format($product->price, 0, ',', '.') }}₫</p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button class="btn btn-success w-100">Mua ngay</button>
                    
                </form>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Gian hàng ưu đãi -->
    <h5 class="mt-5">Gian hàng ưu đãi</h5>
    <ul class="link-list">
        <li><a href="https://example.com/link1">Link 1</a></li>
        <li><a href="https://example.com/link2">Link 2</a></li>
        <li><a href="https://example.com/link3">Link 3</a></li>
        <li><a href="https://example.com/link4">Link 4</a></li>
    </ul>

    <!-- Bài Tin -->
    <h5 class="mt-4">Bài Tin</h5>
    <ul class="link-list">
        <li><a href="https://example.com/link1">Link 1</a></li>
        <li><a href="https://example.com/link2">Link 2</a></li>
        <li><a href="https://example.com/link3">Link 3</a></li>
        <li><a href="https://example.com/link4">Link 4</a></li>
    </ul>
</div>
@endsection
