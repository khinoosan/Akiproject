@extends('layouts.app')

@section('title', 'ユーザ登録')

@section('content')
    <div class="container mt-4">
        <h1>ユーザ登録</h1>


        <form action="{{ route('user.register.store') }}" method="POST" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">氏名</label>
                <input type="text" id="name" name="name" required class="form-control" value="{{ old('name') }}">
                @error('name') <!-- Show specific error message for 'name' -->
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="email" id="email" name="email" required class="form-control" value="{{ old('email') }}">
                @error('email') <!-- Show specific error message for 'email' -->
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" id="password" name="password" required class="form-control">
                @error('password') <!-- Show specific error message for 'password' -->
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">登録</button>
        </form>
    </div>
@endsection
