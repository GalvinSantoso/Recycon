@extends('layout.main')

@section('title', 'Change Password')

@section('content')
    <div class="bg-fdf8f8 p-5">
        <div class="row m-3 justify-content-center">
            <div class="col-lg-8 bg-white shadow-sm rounded p-4">
                <h3 class="text-gradients fw-bold">Change Password</h3>
                <form action="">
                    <div class="mb-3">
                        <label for="oldPassword" class="form-label">Old Password</label>
                        <input type="text" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" name="oldPassword" value="{{ old('oldPassword') }}" required>
                        @error('oldPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="email" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" value="{{ old('newPassword') }}" required>
                        @error('newPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="email" class="form-control @error('confirmPassword') is-invalid @enderror" id="confirmPassword" name="confirmPassword" value="{{ old('confirmPassword') }}" required>
                        @error('confirmPassword')
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
