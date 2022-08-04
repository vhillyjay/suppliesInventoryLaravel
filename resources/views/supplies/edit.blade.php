@extends('layouts.bootstrap')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">edit/update</h1>
</div>

<form action="/supplies/{{ $supplies->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" id="productName" name="productName" value="{{ $supplies->name }}">
    <input type="text" id="productType" name="productType" value="{{ $supplies->type }}">
    <input type="text" id="productBrand" name="productBrand" value="{{ $supplies->brand }}" >
    <input type="number" min="0" id="productPrice" name="productPrice" placeholder="Product Price" required>
    <input type="number" min="0" pattern="[0-9]" id="productQuantity" name="productQuantity" placeholder="Product Quantity" required>
    <input type="submit" value="Submit">
</form>
    
@endsection