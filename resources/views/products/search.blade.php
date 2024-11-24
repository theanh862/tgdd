@extends('layouts.app')

@section('content')
<h1>Kết quả tìm kiếm cho "{{ $query }}"</h1>
@if($products->count())
<div class="row">
    @foreach($products as $product)
    <div class="col-md-3">
        <div class="card mb-4">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">Chi tiết</a>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-success">Thêm vào giỏ</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $products->links() }}
@else
<p>Không tìm thấy sản phẩm nào.</p>
@endif
@endsection
