@extends('layouts.bootstrap')
@section('content')

Supplies <br>
@foreach($searchSupplies as $searchSuppliesData)
    {{ $searchSuppliesData->name }} <br>
@endforeach



@endsection