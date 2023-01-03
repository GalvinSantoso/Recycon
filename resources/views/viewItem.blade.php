@extends('layout.main')

@section('title', 'View Item')

@section('content')
<div class="row justify-content-center p-4">
    <div class="col-lg-10 p-2">
        <h3 class="display-5 text-gradients fw-semibold border-bottom border-2 p-2 text-center mb-3">Manage Item</h3>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        <table>
            <tr>
                <th>No</th>
                <th>Item ID</th>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Price</th>
                <th>Item Category</th>
                <th>Action</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->id }}</td>
                    <td><img src="{{ 'storage/' . $item->image }}" alt="{{ $item->name }}" class="img-fluid shadow-sm" style="width: 60px; height: 60px; object-fit: cover;"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category }}</td>
                    <td>
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
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>


@endsection
