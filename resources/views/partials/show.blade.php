@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        @endif
    </div>
    <div class="col-md-6">
        <h2>{{ $product->name }}</h2>
        <p>{{ number_format($product->price, 0, ',', '.') }}₫</p>
        <p>{{ $product->description }}</p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button class="btn btn-success">Thêm vào giỏ</button>
        </form>
    </div>
</div>
@endsection
