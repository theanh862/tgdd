
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">
    
</head>
<body>
    
    <nav class="navbar navbar-expand-lg" style="background-color: #FFD700;">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo và Tên Trang -->
            <a class="navbar-brand font-weight-bold d-flex align-items-center" href="{{ route('home') }}" style="color: black; font-style: italic;    font-size: x-large;">
                <img src="{{ asset('images/qee.png') }}" alt="The Gioi Di Dong Logo" style="width: 45px; height: auto; margin-right: px; ">
                thegioididong.com
            </a>

            <!-- Thanh Tìm Kiếm -->
            <form class="form-inline d-flex" action="{{ route('products.search') }}" method="GET">
                <input class="form-control" type="search" placeholder="Bạn tìm gì..." name="query" style="width: 400px; border-radius: 20px 0 0 20px; border: none;">
                <button class="btn" type="submit" style="background-color: white; border-radius: 0 20px 20px 0; border: none;">
                    <i class="fas fa-search" style="color: black;"></i>
                </button>
            </form>
            <div>

        @if(Auth::check())
        <div class="login1">
            <span>Xin chào, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
        </div>
        @else

        <a class="nav-link d-flex align-items-center" href="{{ route('login') }}" style="color: black; margin-right: 1px;">
                        <i class="fa-solid fa-user" style="margin-right: 5px;"></i> Đăng nhập </a>
        @endif

        </div>

        <!-- Đăng nhập, Giỏ hàng và Vị trí -->
        <div class="d-flex align-items-center">
           
            <a class="nav-link d-flex align-items-center" href="{{ route('cart.index') }}" style="color: black; margin-right: 15px;">
                <i class="fas fa-shopping-cart" style="margin-right: 5px;"></i> Giỏ hàng
            </a>
            <div class="location-container d-flex align-items-center" style="background-color: #FFEB3B; padding: 5px 10px; border-radius: 20px;">
                <i class="fa fa-map-marker-alt" style="margin-right: 5px;"></i>
                <span>Hà Nội</span>
                <i class="fa fa-chevron-down" style="margin-left: 5px;"></i>
                
            </div>
            
        </div>
    </div>
    @if(Auth::check() && Auth::user()->is_admin)
        <a class="nav-link" href="{{ url('/admin/products') }}">Admin</a>
@endif

    </nav>

<!-- Thanh Danh Mục Chính -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFD700;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarCategories">
            <ul class="navbar-nav mx-auto d-flex justify-content-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'dienthoai') }}" style="color: black;"><i class="fa-solid fa-mobile-screen-button"></i> Điện thoại</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'laptop') }}" style="color: black;"><i class="fa-solid fa-laptop"></i> Laptop</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'phukien') }}" style="color: black;"><i class="fa-solid fa-headphones"></i> Phụ kiện</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'dongho') }}" style="color: black;"><i class="bi bi-watch"></i> Đồng hồ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'tablet') }}" style="color: black;"><i class="bi bi-tablet"></i> Tablet</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'máy cũ') }}" style="color: black;"><i class="bi bi-phone-flip"></i> Máy Cũ, Thu cũ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'Pc máy in') }}" style="color: black;"><i class="bi bi-pc-display"></i> PC, máy in</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'sim') }}" style="color: black;"><i class="bi bi-sim"></i> Sim, Thẻ cào</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('category.show', 'dịch vụ tiện ích') }}" style="color: black;"><i class="bi bi-tools"></i> Dịch vụ tiện ích</a></li>
            </ul>
        </div>
    </div>
</nav>



  

</body>
</html>