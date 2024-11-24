@extends('layouts.app')

@section('content')
<h1>Danh Mục Sản Phẩm</h1>
<ul class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item">
        <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
    </li>
    @endforeach
</ul>
@endsection
