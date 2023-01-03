@extends('layout.main')

@section('title', 'Cart List')
@dd($cartItems[0]->item)
@section('content')
    <div class="bg-fdf8f8 p-3">
        <div class="row justify-content-center p-2">
            <h1 class="text-gradients display-3 fw-semibold text-center">My Cart</h1>
            @if($cartItems->count())
                <div class="col-lg-10">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Item Image</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><img src="{{ 'storage/' . $cartItem->item->image }}" alt="{{ $cartItem->item->name }}" class="img-fluid shadow-sm" style="width: 60px; height: 60px; object-fit: cover;"></td>
                                <td>{{ $cartItem->item->name }}</td>
                                <td>{{ $cartItem->item->price }}</td>
                                <td>{{ $cartItem->quantity }}</td>
                                <td>{{ $cartItem->quantity * $cartItem->item->price }}</td>
                                {{-- <td>
                                    <ul class="list-unstyled d-flex align-items-center">
                                        <li class="mx-2"><a href="/updateItem/{{ $item->id }}" class="btn btn-warning">Update</a></li>
                                        <li class="mx-2">
                                            <form action="/deleteItem/{{ $item->id }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="col-lg-8 p-3">
                    <h3 class="text-warning display-3 text-center fw-semibold">Cart is Empty! Lets go shopping</h3>
                </div>
            @endif
        </div>

    </div>



@endsection
