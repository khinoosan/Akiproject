@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
    <div class="container mt-4">
        <h1>お問い合わせ</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('inquiry.submit') }}" method="POST" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">氏名 </label>
                <input type="text" id="name" name="name" required class="form-control" value="{{ old('name', session('data.name')) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', session('data.email')) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">本文 </label>
                <textarea id="body" name="body" rows="5" required class="form-control">{{ old('body', session('data.body')) }}</textarea>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">送信 (Send)</button>
        </form>
    </div>
@endsection
