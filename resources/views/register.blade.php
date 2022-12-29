@extends('layout.main')

@section('title','Register')

@section('content')
    <div class="row justify-content-center px-2 py-5 bg-fdf8f8" >
        <div class="col-lg-8 bg-white p-3 rounded shadow">
            <h1 class="p-2 mb-3">Register Form</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Full Name" class="form-control p-3 @error('name')
                        is-invalid
                    @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" class="form-control p-3 @error('email')
                        is-invalid
                    @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control p-3 @error('password')
                        is-invalid
                    @enderror" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control p-3 @error('password_confirmation')
                        is-invalid
                    @enderror" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn-gradients">Register Now</button>
                </div>
            </form>
        </div>
    </div>
@endsection
