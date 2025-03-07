@extends('layouts.app')

@section('title', '問い合わせ')

@section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">問い合わせ</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('inquiry.submit') }}" method="POST" class="needs-validation">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">氏名 (Name):</label>
                <input type="text" id="name" name="name" required class="form-control" placeholder="氏名を入力してください">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス (Email):</label>
                <input type="email" id="email" name="email" required class="form-control" placeholder="メールアドレスを入力してください">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">本文 (Body):</label>
                <textarea id="body" name="body" rows="5" required class="form-control" placeholder="本文を入力してください"></textarea>
                @error('body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">送信 (Send)</button>
        </form>
    </div>
@endsection
