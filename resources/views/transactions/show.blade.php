@extends('layouts.bootstrap')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Transaction Details</h6>
                </div>
                <div class="card-body">
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <span class="input-group-text" id="basic-addon1">{{ $transaction->id  }}</span>
                    </div>
                    <!-- <p> Transaction ID - {{ $transaction->id  }} </p> -->

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Product ID</span>
                        <span class="input-group-text" id="basic-addon1">{{ $transaction->supplies_id  }}</span>
                    </div>
                    <!-- <p> Product ID - {{ $transaction->supplies_id }} </p>  -->

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Product Name</span>
                        <span class="input-group-text" id="basic-addon1">{{ $transaction->product_name  }}</span>
                    </div>
                    <!-- <p> Product name - {{ $transaction->product_name }} </p>  -->

                    @if($transaction->sell_to === NULL)
                        <div class="input-group my-2">
                            <span class="input-group-text" id="basic-addon1">Quantity bought</span>
                            <span class="input-group-text" id="basic-addon1">{{ $transaction->product_quantity  }}</span>
                        </div>
                        <!-- <p> Quantity bought - {{ $transaction->product_quantity }} </p> -->

                    @elseif($transaction->buy_from === NULL)
                        <div class="input-group my-2">
                            <span class="input-group-text" id="basic-addon1">Quantity sold</span>
                            <span class="input-group-text" id="basic-addon1">{{ $transaction->product_quantity  }}</span>
                        </div>
                        <!-- <p> Quantity sold - {{ $transaction->product_quantity }}</p> -->

                    @endif
                    <!-- <p> Product Quantity - {{ $transaction->product_quantity }} </p> -->

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Product Price(per piece)</span>
                        <span class="input-group-text" id="basic-addon1">₱{{ $transaction->product_price }}</span>
                    </div>
                    <!-- <p> Product Price(per piece) - {{ $transaction->product_price }} </p> -->

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Transaction Price</span>
                        <span class="input-group-text" id="basic-addon1">₱{{ $transaction->transaction_price }}</span>
                    </div>
                    <!-- <p> Transaction Price - {{ $transaction->transaction_price }} </p> -->

                    @if($transaction->sell_to === NULL)
                        <div class="input-group my-2">
                            <span class="input-group-text" id="basic-addon1">Bought from</span>
                            <span class="input-group-text" id="basic-addon1">{{ $transaction->buy_from }}</span>
                        </div>
                        <!-- <p>Bought from - {{ $transaction->buy_from }}</p> -->

                    @elseif($transaction->buy_from === NULL)
                        <div class="input-group my-2">
                            <span class="input-group-text" id="basic-addon1">Sold to</span>
                            <span class="input-group-text" id="basic-addon1">{{ $transaction->sell_to }}</span>
                        </div>
                        <!-- <p>Sold to - {{ $transaction->sell_to }}</p> -->

                    @endif

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Issued by</span>
                        <span class="input-group-text" id="basic-addon1">{{ $transaction->issued_by }}</span>
                    </div>
                    <!-- <p> Issued by - {{ $transaction->issued_by }} </p> -->

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Issued last</span>
                        <span class="input-group-text" id="basic-addon1">{{ $transaction->created_at }}</span>
                    </div>
                    <!-- <p> Issued last - {{ $transaction->created_at }} </p> -->

                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="bi bi-printer"></i> 
                            Generate Report/Print
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection