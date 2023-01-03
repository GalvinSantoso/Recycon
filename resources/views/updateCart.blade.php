@extends('layout.main')

@section('title', 'Update Cart')

@section('content')
    <div class="row justify-content-center p-4 bg-fdf8f8">
        <div class="col-lg-10 bg-white rounded shadow-sm p-5">
            <h1 class="text-gradients display-3 fw-semibold">Update Cart</h1>
            <div class="row border border-primary p-3">
                <div class="col-md-4 p-2 border-end border-2 border-primary">
                    <img src="{{ asset('storage/'.$cart->item[0]->image) }}" alt="{{ $cart->item[0]->name }}" class="img-fluid">
                </div>
                <div class="col-md-8 p-2">
                    <h3 class="text-gradients display-5 fw-bold">{{ $cart->item[0]->name }}</h3>
                    <form action="/updateCart/{{ $cart->id }}" method="POST" class="d-flex align-items-center">
                        @method('put')
                        @csrf
                        <div class="mx-3">
                            <label for="quantity">Qty:</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $cart->quantity) }}">
                            @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <button type="submit" class="btn-gradients mx-3">Update Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
