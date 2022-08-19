@extends('layouts.bootstrap')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Home</h1>
</div>
    <!-- <a href="/dashboard">dashboard</a> -->
    @foreach($home as $suppliesData)
        <tr>     
            <td>{{ $suppliesData->id }}</td>             
            <td>{{ $suppliesData->name }}</td>
            <td>{{ $suppliesData->type }}</td>
            <td>{{ $suppliesData->brand }}</td>
            <td>{{ $suppliesData->price }}</td>
            <td>{{ $suppliesData->quantity }}</td>
            <td><a href="  "> {{ $perProduct = $suppliesData->price * $suppliesData->quantity }} </a></td>
            total amount per prod {{  $perProduct }} php <br>
        </tr>                    
    @endforeach
@endsection