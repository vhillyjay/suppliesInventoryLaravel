@extends('layouts.bootstrap')
@section('content')

Supplies <br>
@foreach($searchSupplies as $searchSuppliesData)
    {{ $searchSuppliesData->name }} <br>
@endforeach

Transac <br>
@foreach($searchTransaction as $searchTransactionData)
    {{ $searchTransactionData->product_name }} <br>
@endforeach

Trans issued by <br>
@foreach($searchTransaction as $searchTransactionData)
    {{ $searchTransactionData->issued_by }} <br>
@endforeach

<br>
paging paging<br>
@foreach($sampling as $samplingData)
    {{ $samplingData->id }} <br>
@endforeach

@endsection