@extends('layouts.admin') 

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Thêm Danh Mục Mới</h1>
    
    {{-- Form để thêm danh mục --}}
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên Danh Mục</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (Tùy chọn)</label>
            <input type="text" name="slug" id="slug" class="form-control" placeholder="Nhập slug (nếu không nhập sẽ tự tạo)">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
