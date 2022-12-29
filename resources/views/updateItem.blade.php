@extends('layout.main')

@section('title', 'Update Item')

@section('content')
    <div class="row bg-fdf8f8 justify-content-center p-4">
        <div class="col-lg-8 shadow rounded bg-white p-3">
            <h1 class="display-5 text-gradients fw-semibold">Update Item</h1>
            <form  action="/updateItem/{{ $item->id }}" method="POST">
                @method('put')
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="itemID" class="form-label">Item ID</label>
                        <input type="text" id="itemID" name="id" class="form-control" disabled value="{{ $item->id }}">
                    </div>
                    <div class="col">
                        <label for="itemPrice" class="form-label">Item Price</label>
                        <input type="text" class="form-control" id="itemPrice" name="price" value="{{ old('price', $item->price) }}">
                    </div>
                    <div class="col">
                        <label for="itemCategory" class="form-label d-block">Item Category</label>
                        <select name="category" id="itemCategory" class="border-1 rounded px-3 py-1 text-muted fw-semibold">
                            @if ($item->category == 'recycle')
                                <option value="recycle" selected>recycle</option>
                            @else
                                <option value="second" selected>second</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="itemName" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="name" value="{{ old('name', $item->name) }}">
                </div>
                <div class="mb-3">
                    <label for="itemDescription" class="form-label">Item Description</label>
                    <textarea class="form-control" id="itemDescription" rows="4" name="description">{{ old('description', $item->description) }}</textarea>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="itemImage" class="form-label">Item Image</label>
                        <img src="{{ asset('storage/' . old('image', $item->image))  }}"
                        alt="{{ $item->name }}" style="width: 300px; object-fit: cover" />
                    </div>
                    <div class="col">
                        <label for="itemImageFile" class="form-label">Item Image File</label>
                        <input type="text" id="itemImageFile" class="form-control" disabled value="{{ $item->image }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">New Image</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                  </div>
                  <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-warning">Update</button>
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
