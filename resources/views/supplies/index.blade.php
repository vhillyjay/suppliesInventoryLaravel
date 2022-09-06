@extends('layouts.bootstrap')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Supplies Inventory</h1>
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
                    @foreach($supplies as $suppliesData)
                        <tr>     
                            <td>{{ $suppliesData->id }}</td>             
                            <td>{{ $suppliesData->name }}</td>
                            <td>{{ $suppliesData->type }}</td>
                            <td>{{ $suppliesData->brand }}</td>
                            <td>{{ $suppliesData->price }}</td>
                            <td>{{ $suppliesData->quantity }}</td>
                            <!-- <td><a href="/supplies/{{$suppliesData->id}}">Details</a></td> -->
                            <td><a href=" {{ route('supplies.show', $suppliesData->id) }} ">Details</a></td>
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