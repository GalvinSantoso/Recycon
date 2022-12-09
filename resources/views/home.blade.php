@extends('layout.main')

@section('title', 'Home')

@section('content')

    <div class="row" style="min-height: 500px">
        <div class="col homepage d-flex justify-content-center align-items-center">
            <h1 class="display-1 text-warning fw-bold">Recycon Home</h1>
        </div>
    </div>


    <div class="row my-3">
        <div class="col d-flex flex-column justify-content-center text-center">
            <h2 class="text-success fw-semibold display-4 mb-3 p-4">ABOUT US</h2>
            <div class=" px-4 mb-2">
                <h2 class="p-4" style="border: 4px dotted #dca1ff">We are a shop for buying recycle things and second hand thing</h2>
            </div>
        </div>
    </div>


@endsection
