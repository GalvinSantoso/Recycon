@extends('layout.main')

@section('title', 'Edit Profile')

@section('content')
    <div class="bg-fdf8f8 p-5">
        <div class="row m-3 justify-content-center">
            <div class="col-lg-8 bg-white shadow-sm rounded p-4">
                <h3 class="text-gradients fw-bold">Edit Profile</h3>
                <form action="">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">New Username</label>
                        <input type="text" class="form-control @error('newUsername') is-invalid @enderror" id="newUsername" name="newUsername" value="{{ old('newUsername') }}" required>
                        @error('newUsername')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newEmail" class="form-label">New Email</label>
                        <input type="email" class="form-control @error('newEmail') is-invalid @enderror" id="newEmail" name="newEmail" value="{{ old('newEmail') }}" required>
                        @error('newEmail')
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
