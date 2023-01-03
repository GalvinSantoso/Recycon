@extends('layout.main')

@section('title', 'Show Product')

@section('content')
    <div class="bg-fdf8f8 p-3">
        <h1 class="text-center mb-5">Our Product</h1>
        @if($items->count())
            <div class="row justify-content-center mb-3">
                @foreach ($items as $item)
                    <div class="col-lg-4 mb-5">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 300px; object-fit: cover">
                            <div class="card-body p-4 position-relative">
                                <div class="position-absolute top-1 end-0 me-4 fw-semibold text-muted">
                                    {{ $item->category }}
                                </div>
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">IDR. {{ $item->price }}</p>
                            <a href="/productDetail/{{ $item->id }}" class="btn-gradients text-decoration-none">Detail Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{ $items->links() }}
                </div>
            </div>
      @else
            <div class="row justify-content-center mb-3 p-4">
                <div class="col-lg-8 p-3">
                    <h3 class="text-warning display-3 text-center fw-semibold">No Items Found</h3>
                </div>
            </div>
      @endif

    </div>

@endsection
