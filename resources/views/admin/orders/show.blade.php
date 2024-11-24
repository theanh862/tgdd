@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <h4>User: {{ $order->user->name }}</h4>
    <h4>Total Price: {{ number_format($order->total_price, 0, ',', '.') }} đ</h4>
    <h4>Status: {{ ucfirst($order->status) }}</h4>

    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <label for="status">Update Status:</label>
        <select name="status" id="status" class="form-control w-25">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
        </select>
        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>

    <h4 class="mt-4">Order Items:</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
