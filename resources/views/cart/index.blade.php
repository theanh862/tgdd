@extends('layouts.app')

@section('content')
<div class="cart-container">
    <h1>Giỏ hàng của bạn</h1>
    <a href="{{ route('orders.index') }}" class="nav-link">Đơn hàng của tôi</a>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <ul class="cart-list list-group mb-4">
            @php $total = 0; @endphp
            @foreach($cart as $id => $product)
                <li class="cart-item list-group-item d-flex justify-content-between align-items-center">
                    <!-- Hiển thị tên sản phẩm -->
                    <div>
                        <strong>{{ $product['name'] }}</strong>
                        <p>{{ number_format($product['price'], 0, ',', '.') }} đ</p>
                    </div>

                    <!-- Hiển thị số lượng và nút cập nhật -->
                    <div>
                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1" style="width: 60px; text-align: center;">
                            <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                        </form>
                    </div>

                    <!-- Nút xóa sản phẩm -->
                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </li>
                @php $total += $product['price'] * $product['quantity']; @endphp
            @endforeach
        </ul>

        <!-- Hiển thị tổng tiền -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4>Tổng tiền:</h4>
            <h4 class="text-success">{{ number_format($total, 0, ',', '.') }} đ</h4>
        </div>

        <!-- Nút đặt hàng -->
        <form action="{{ route('cart.order') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-block">Đặt hàng</button>
        </form>
    @else
        <p>Giỏ hàng của bạn trống.</p>
    @endif
</div>
@endsection
