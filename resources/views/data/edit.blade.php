@extends('layouts.app')

@section('title', 'データ編集')

@section('content')
<div class="container mt-4">
    <h1>データ編集</h1>

    <form action="{{ route('dashboard.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $data->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">カテゴリ</label>
            <select name="category" class="form-select @error('category') is-invalid @enderror">
                @foreach(['カテゴリ１', 'カテゴリ２', 'カテゴリ３'] as $category)
                    <option value="{{ $category }}" {{ old('category', $data->category) == $category ? 'selected' : '' }}>{{ $category }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">本文</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ old('content', $data->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">編集</button>
    </form>
</div>
@endsection
