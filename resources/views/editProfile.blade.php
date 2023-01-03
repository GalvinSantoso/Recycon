@extends('layout.main')

@section('title', 'Edit Profile')

@section('content')
    <div class="bg-fdf8f8 p-5">
        <div class="row m-3 justify-content-center">
            <div class="col-lg-8 bg-white shadow-sm rounded p-4">
                <h3 class="text-gradients fw-bold">Edit Profile</h3>
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                <form action="/editProfile" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">New Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', Auth::user()->name) }}" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">New Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
