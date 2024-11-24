@extends('layouts.app')

@section('content')
    <div class="product-detail">
        <h1>{{ $product->name }}</h1>
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" />
        <p>{{ $product->description }}</p>
        <p>Price: {{ number_format($product->price, 0, ',', '.') }}₫</p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
        </form>
    </div>
@endsection

