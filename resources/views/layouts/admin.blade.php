<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Thêm CSS hoặc thư viện -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark text-white p-3">
        <div class="container">
            <h1 class="h3">Admin Panel</h1>
            <nav>
                <a href="{{ route('dashboard') }}" class="text-white me-3">Dashboard</a>
                <a href="{{ route('admin.categories.index') }}" class="text-white me-3">Categories</a>
                <a href="{{ route('admin.products.index') }}" class="text-white">Products</a>
                <a href="{{ route('admin.orders.index') }}" class="nav-link text-white">Orders</a>
            </nav>
        </div>
    </header>

    <div class="container my-4">
        @yield('content') <!-- Nội dung từng trang -->
    </div>

  
    <!-- Thêm JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
