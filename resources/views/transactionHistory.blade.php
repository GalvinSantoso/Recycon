@extends('layout.main')

@section('title', 'Transaction History')

@section('content')
    <div class="bg-fdf8f8 p-3">
    <div class="row justify-content-center p-2">
        <h1 class="text-gradients display-3 fw-semibold text-center">My History Transaction</h1>
        @if ($transactionItems->count())
        <?php $indexCollapse = 0; ?>
        <div class="accordion" id="accordionExample">
            @foreach ($transactionItems as $key =>$items )
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{ '#collapse'.$indexCollapse }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ date('Y-m-d',strtotime($key)) }}
                    </button>
                    </h2>
                    <div id="{{ 'collapse'.$indexCollapse }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="w-100">
                                <tr>
                                    <th>No</th>
                                    <th>Item Image</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                <?php $total = 0; ?>
                                @foreach ($items as $transactionItem)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ 'storage/' . $transactionItem->item[0]->image }}" alt="{{ $transactionItem->item[0]->name }}" class="img-fluid shadow-sm" style="width: 60px; height: 60px; object-fit: cover;"></td>
                                        <td>{{ $transactionItem->item[0]->name }}</td>
                                        <td>{{ $transactionItem->item[0]->price }}</td>
                                        <td>{{ $transactionItem->quantity }}</td>
                                        <?php $total += $transactionItem->quantity * $transactionItem->item[0]->price ; ?>
                                        <td>{{ $transactionItem->quantity * $transactionItem->item[0]->price }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="my-2">
                                <span class="text-gradients fw-bold fs-3">Grand Total: </span>
                                <span class="fw-semibold text-primary fs-3">IDR. {{ $total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $indexCollapse++; ?>
                @endforeach
        </div>
        @else
            <div class="col-lg-8 p-3">
                <h3 class="text-warning display-3 text-center fw-semibold">Transaction History is Empty! Lets go shopping</h3>
            </div>
        @endif
    </div>
    </div>
@endsection
