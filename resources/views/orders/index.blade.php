@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Đơn hàng của bạn</h1>

    @foreach($orders as $order)
        <div class="card mb-4">
            <div class="card-header">
                <strong>Mã đơn hàng: {{ $order->id }}</strong> | Ngày đặt: {{ $order->created_at->format('d/m/Y') }} | Trạng thái: {{ ucfirst($order->status) }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                                <td>{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5 class="text-right">Tổng tiền: {{ number_format($order->total_price, 0, ',', '.') }} đ</h5>
            </div>
        </div>
    @endforeach
</div>
@endsection
