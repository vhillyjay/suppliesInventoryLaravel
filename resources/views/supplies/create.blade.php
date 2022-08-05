@extends('layouts.bootstrap')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create</h1>
</div>

<!-- <form action="/supplies" method="POST"> -->
<form action=" {{ route('supplies.store') }} " method="POST">
    @csrf
    <input type="text" id="productName" name="productName" placeholder="Product Name" required>
    <input type="text" id="productType" name="productType" placeholder="Product Type" required>
    <input type="text" id="productBrand" name="productBrand" placeholder="Product Brand">
    <input type="number" min="0" id="productPrice" name="productPrice" placeholder="Product Price" required>
    <input type="number" min="0" pattern="[0-9]" id="productQuantity" name="productQuantity" placeholder="Product Quantity" required>
    <input type="submit" value="Submit">
</form>

<p> {{ session('productConfirmation') }} </p>
    
@endsection