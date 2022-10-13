@extends('layouts.bootstrap')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Home</h1>
</div>
        <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Supplies in Stock
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalCounter }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Gross Amount of Stocks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ₱{{ $productGross }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash-coin fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Stocks Sold
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $stocksSold }}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Stocks Bought</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $stocksBought }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Gross Amout of Stocks Sold</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ₱{{ $stocksSoldGross }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Gross Amount of Stocks Bought
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ₱{{ $stocksBoughtGross }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash-coin fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Transactions this Month
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">  
                                {{ $transactionsPerMonth }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Recent Product Changes/Addition
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php $productCount = 0; ?>
                            @if (count($recentProductChanges) > 0)
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ($recentProductChanges as $recentProductChangesData)
                                <tr>
                                    <td>
                                        <a href="{{ route('supplies.show', $recentProductChangesData->id) }}">
                                            {{ $recentProductChangesData->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('supplies.show', $recentProductChangesData->id) }}">
                                            {{ $recentProductChangesData->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $recentProductChangesData->updated_at }}
                                    </td>
                                </tr>
                                        <?php if($productCount == 2) {
                                            break;
                                        } ?>
                                        <?php $productCount++; ?>
                                @endforeach
                            </tbody>
                            @else
                                <span>No recent products</span>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card mb-4">
                <div class="card-header">
                    Recent Transactions
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php $transactionCount = 0; ?>
                            @if (count($recentTransactions) > 0)
                            <tbody>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Issued by</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ($recentTransactions as $recentTransactionsData)
                                <tr>
                                    <td>
                                        <a href="{{ route('transactions.show', $recentTransactionsData->id) }}">
                                            {{ $recentTransactionsData->id }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('transactions.show', $recentTransactionsData->id) }}">
                                            {{ $recentTransactionsData->product_name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $recentTransactionsData->issued_by }}
                                    </td>
                                    <td>
                                        {{ $recentTransactionsData->created_at }}
                                    </td>
                                </tr>
                                        <?php if($transactionCount == 2) {
                                            break;
                                        } ?>
                                        <?php $transactionCount++; ?>
                                @endforeach
                            </tbody>
                            @else
                                <span>No recent transactions</span>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection