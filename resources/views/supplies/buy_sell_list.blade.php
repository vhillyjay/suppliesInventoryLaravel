@extends('layouts.bootstrap')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buy Sell List</h1>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Price(PHP)</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Brand</th>
                            <th>Price(PHP)</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($sellItemList as $sellItemListData)
                        <tr>     
                            <td>{{ $sellItemListData->id }}</td>             
                            <td>{{ $sellItemListData->name }}</td>
                            <td>{{ $sellItemListData->type }}</td>
                            <td>{{ $sellItemListData->brand }}</td>
                            <td>{{ $sellItemListData->price }}</td>
                            <td>{{ $sellItemListData->quantity }}</td>
                            <td>
                                <a href="{{ route('supplies.buy', $sellItemListData->id) }}">Buy</a>
                                <a href="{{ route('supplies.sell', $sellItemListData->id) }}">Sell</a>
                            </td>
                            <!-- named routes -->
                        </tr>                    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(session('sellSuccess'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('sellSuccess') }}
        </div>
    @elseif(session('buySuccess'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('buySuccess') }}
        </div>
    @endif
@endsection