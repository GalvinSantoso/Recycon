@extends('layout.main')

@section('title', 'Update Item')

@section('content')
    <div class="row bg-fdf8f8 justify-content-center p-4">
        <div class="col-lg-8 shadow rounded bg-white p-3">
            <h1 class="display-5 text-gradients fw-semibold">Add New Item</h1>
            <form  action="/addItem" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="itemID" class="form-label">Item ID</label>
                        <input type="text" id="itemID" name="id" class="form-control @error('itemID') is-invalid @enderror" value="{{ old('itemID') }}" required autofocus>
                        @error('itemID')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="itemPrice" class="form-label">Item Price</label>
                        <input type="text" class="form-control @error('itemPrice') is-invalid @enderror" id="itemPrice" name="price" value="{{ old('price') }}" required>
                        @error('itemPrice')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="itemCategory" class="form-label d-block">Item Category</label>
                        <select name="category" id="itemCategory" class="border-1 rounded px-3 py-1 text-muted fw-semibold">
                            <option selected disabled hidden>Choose One</option>
                            <option value="recycle">recycle</option>
                            <option value="second">second</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="itemName" class="form-label">Item Name</label>
                    <input type="text" class="form-control @error('itemName') is-invalid @enderror" id="itemName" name="name" value="{{ old('name') }}" required>
                    @error('itemName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="itemDescription" class="form-label">Item Description</label>
                    <textarea class="form-control @error('itemDescription') is-invalid @enderror" id="itemDescription" rows="4" name="description" required>{{ old('description') }}</textarea>
                    @error('itemDescription')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="itemImage" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="itemImage" name="image" required>
                  </div>
                  <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-warning">Add Item</button>
                  </div>
            </form>
        </div>
    </div>
    @error('id')
        <div class="bg-warning">
            error
        </div>
    @enderror


@endsection
