@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-form">
        <h2>Đăng nhập</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
            <p class="text-center">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>Tài khoản không tồn tại => <a href="{{ route('register') }}">Đăng ký ngay</a></li>
            @endforeach
        </ul>
    </div>
@endif

        </form>
    </div>
</div>
@endsection
