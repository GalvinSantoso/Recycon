@extends('layout.main')

@section('title', 'Cart List')

@section('content')
    <div class="bg-fdf8f8 p-3">
        <div class="row justify-content-center p-2">
            <h1 class="text-gradients display-3 fw-semibold text-center">My Cart</h1>
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            @if($cartItems->count())
                <div class="col-lg-10 p-4">
                    <table class="w-100">
                        <tr>
                            <th>No</th>
                            <th>Item Image</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        <?php $total = 0; ?>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ 'storage/' . $cartItem->item[0]->image }}" alt="{{ $cartItem->item[0]->name }}" class="img-fluid shadow-sm" style="width: 60px; height: 60px; object-fit: cover;"></td>
                                <td>{{ $cartItem->item[0]->name }}</td>
                                <td>{{ $cartItem->item[0]->price }}</td>
                                <td>{{ $cartItem->quantity }}</td>
                                <?php $total += $cartItem->quantity * $cartItem->item[0]->price ; ?>
                                <td>{{ $cartItem->quantity * $cartItem->item[0]->price }}</td>
                                <td>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-center">
                                        <li class="mx-2"><a href="/updateCart/{{ $cartItem->id }}" class="btn btn-warning">Update</a></li>
                                        <li class="mx-2">
                                            <form action="/deleteCart/{{ $cartItem->id  }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="my-2">
                        <span class="text-gradients fw-bold fs-3">Grand Total: </span>
                        <span class="fw-semibold text-primary fs-3">IDR. {{ $total }}</span>
                    </div>
                    <div>
                        <h3 class="text-gradients display-5 fw-semibold">Receiver</h3>
                        <form action="/transactionHistory" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-3">
                                <label for="receiverName" class="form-label">Receiver Name</label>
                                <input type="receiverName" class="form-control @error('receiverName') is-invalid @enderror" id="receiverName" name="receiverName" value="{{ old('receiverName', Auth::user()->name ) }}" required>
                                @error('receiverName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="receiverAddress" class="form-label">Receiver Address</label>
                                <textarea class="form-control" id="receiverAddress" rows="4" name="receiverAddress"></textarea>
                                @error('receiverAddress')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-warning" type="submit">Checkout ({{ $cartItems->count() }})</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="col-lg-8 p-3">
                    <h3 class="text-warning display-3 text-center fw-semibold">Cart is Empty! Lets go shopping</h3>
                </div>
            @endif
        </div>

    </div>



@endsection
