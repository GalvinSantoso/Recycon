@extends('layout.main')

@section('title', 'Login')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif


    <div class="row justify-content-center px-2 py-5 bg-fdf8f8">
        <div class="col-md-4 bg-white shadow p-3 rounded">
            <h3 class="mb-3 fw-normal p-2">Please Sign In</h3>
            <form action="/login" method="POST">
                @csrf
                <div class="form-outline mb-3">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control p-3
                    @error('email') is-invalid @enderror" autofocus required value="{{ old('email', Cookie::get('emailCookie') !== null ? Cookie::get('emailCookie') : "") }}"/>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-3">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control p-3" required value="{{ old('password', Cookie::get('passwordCookie') !== null ? Cookie::get('passwordCookie') : "") }}"/>
                </div>

                <div class="mb-3 p-2">
                    <input class="form-check-input" type="checkbox" id="checkInput" name="remember" {{ Cookie::get('emailCookie') !== null ? "checked" : "" }}/>
                    <label class="form-check-label" for="checkInput">Remember me</label>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn-gradients">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
