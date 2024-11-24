@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-form">
        <h2>Đăng ký</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" name="name" id="name" placeholder="Nhập tên đầy đủ" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Nhập email" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Xác nhận mật khẩu" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </div>
            <p class="text-center">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
        </form>
    </div>
</div>
@endsection
