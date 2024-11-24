@extends('layouts.admin')

@section('title', isset($category) ? 'Edit Category' : 'Add Category')

@section('content')
<h2>{{ isset($category) ? 'Edit Category' : 'Add New Category' }}</h2>

<form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
    @csrf
    @if(isset($category))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name ?? old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="3">{{ $category->description ?? old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Create' }}</button>
</form>
@endsection
