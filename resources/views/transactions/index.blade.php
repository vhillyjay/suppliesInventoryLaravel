@extends('layouts.bootstrap')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of current data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Supplies ID</th>
                            <th>Product Name</th>
                            <th>Quantity Sold/Bought</th>
                            <th>Transaction Price</th>
                            <th>Sold To</th>
                            <th>Bought From</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Supplies ID</th>
                            <th>Product Name</th>
                            <th>Quantity Sold/Bought</th>
                            <th>Transaction Price</th>
                            <th>Sold To</th>
                            <th>Bought From</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($transactionRecords as $transactionRecordsData)
                        <tr>     
                            <td>{{ $transactionRecordsData->transaction_id }}</td>             
                            <td>{{ $transactionRecordsData->supplies_id }}</td>
                            <td>{{ $transactionRecordsData->product_name }}</td>
                            <td>{{ $transactionRecordsData->product_quantity }}</td>
                            <td>{{ $transactionRecordsData->transaction_price }}</td>
                            <td>{{ $transactionRecordsData->sell_to }}</td>
                            <td>{{ $transactionRecordsData->buy_from }}</td>
                            <td><a href="">More</a></td>
                            <!-- <td><a href="  ">Details</a></td> -->
                            <!-- named routes -->
                        </tr>                    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(session('productConfirmation'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('productConfirmation') }}
        </div>
    @elseif(session('productDeletion'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('productDeletion') }}
        </div>
    @endif
@endsection