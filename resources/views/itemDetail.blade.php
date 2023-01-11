@extends('layout.main')

@section('title', 'productDetail')

@section('content')
    <div class="row justify-content-center bg-fdf8f8">
        <div class="col-lg-8 bg-white rounded p-4 shadow my-5">
            <div class="row">
                <div class="col-md-4 p-2">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="" class="img-fluid" style="min-height: 400px; object-fit: cover;">
                </div>
                <div class="col-md-8 p-2">
                    <h2 class="mb-2 p-2">{{ $item->name }}</h2>
                    <div class="p-2 mb-3 border-bottom border-2">
                        <h5>Category:</h5>
                        <span class="text-muted fw-semibold">{{ $item->category }}</span>
                    </div>
                    <div class="p-2 mb-3 border-bottom border-2">
                        <h5>Price:</h5>
                        <span class="text-muted fw-semibold">IDR {{ $item->price }}</span>
                    </div>
                    <div class="p-2 mb-3 border-bottom border-2">
                        <h5>Description:</h5>
                        <span class="text-muted fw-semibold">{{ $item->description }}</span>
                    </div>
                    <div class="p-2 mb-3">
                        @auth
                            @if(Auth::user()->user_role_id == 1)
                            <form action="/cartList" method="POST" class="d-flex align-items-center">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}" >
                                <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}" >
                                <div class="mx-3">
                                    <label for="quantity">Qty:</label>
                                    <input type="number" name="quantity" class="@error('quantity') is-invalid @enderror" id="quantity" value="1">
                                    @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-gradients mx-3">Add To Cart</button>
                            </form>
                            @endif
                        @else
                        <a href="/login" class="btn-gradients text-decoration-none">Login to Buy</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
