@extends('layouts.bootstrap')
@section('content')
<!-- <form action="/supplies" method="POST"> -->
<!-- <form action=" {{ route('supplies.store') }} " method="POST">
    @csrf
    <input type="text" id="productName" name="productName" placeholder="Product Name" required>
    <input type="text" id="productType" name="productType" placeholder="Product Type" required>
    <input type="text" id="productBrand" name="productBrand" placeholder="Product Brand">
    <input type="number" min="0" id="productPrice" name="productPrice" placeholder="Product Price" required>
    <input type="number" min="0" pattern="[0-9]" id="productQuantity" name="productQuantity" placeholder="Product Quantity" required>
    <input type="submit" value="Submit">
</form>

<p> {{ session('productConfirmation') }} </p> -->

<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create New Product</h6>
            </div>
            <div class="card-body">
                <form action=" {{ route('supplies.store') }} " method="POST">
                    @csrf
                    <input type="text" class="form-control my-2" id="productName" name="productName" placeholder="Name" required>
                    <input type="text" class="form-control my-2" id="productType" name="productType" placeholder="Type" required>
                    <input type="text" class="form-control my-2" id="productBrand" name="productBrand" placeholder="Brand" required>
                    <input type="number" class="form-control my-2" id="productPrice" name="productPrice" placeholder="Price" required min="0">
                    <input type="number" class="form-control my-2" id="productQuantity" name="productQuantity" placeholder="Quantity" required min="0">
                    <div class="align-items-end">
                        <input type="submit" value="Submit" class="btn btn-outline-primary">
                        <!-- align end -->
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
    
@endsection