@extends('layouts.bootstrap')
@section('content')

<!-- <form action="/supplies/{{ $supplies->id }}" method="POST"> -->
<!-- <form action=" {{ route('supplies.update', $supplies->id) }} " method="POST">
    @csrf
    @method('PUT')
    <input type="text" id="productName" name="productName" value="{{ $supplies->name }}">
    <input type="text" id="productType" name="productType" value="{{ $supplies->type }}">
    <input type="text" id="productBrand" name="productBrand" value="{{ $supplies->brand }}">
    <input type="number" min="0" id="productPrice" name="productPrice" value="{{ $supplies->price }}" required>
    <input type="number" min="0" pattern="[0-9]" id="productQuantity" name="productQuantity" value="{{ $supplies->quantity }}" required>
    <input type="submit" value="Submit">
</form> -->

<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Product Details</h6>
            </div>
            <div class="card-body">
                <!-- <form action="/supplies/{{ $supplies->id }}" method="POST"> -->
                <form action=" {{ route('supplies.update', $supplies->id) }} " method="POST">
                    @csrf
                    @method('PUT')
                                       
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" id="productName" name="productName" value="{{ $supplies->name }}" class="form-control" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Type</span>
                        <input type="text" id="productType" name="productType" value="{{ $supplies->type }}" class="form-control" aria-label="" aria-describedby="">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Brand</span>
                        <input type="text" id="productBrand" name="productBrand" value="{{ $supplies->brand }}" class="form-control" aria-label="" aria-describedby="">
                    </div>

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Price</span>
                        <input type="text" min="0" id="productPrice" name="productPrice" value="{{ $supplies->price }}" class="form-control" aria-label="" aria-describedby="">
                    </div>

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Quantity</span>
                        <input type="text" min="0"  id="productQuantity" name="productQuantity" value="{{ $supplies->quantity }}" class="form-control" aria-label="" aria-describedby="">
                    </div>

                    <input type="submit" value="Submit" class="btn btn-outline-primary">
                </form>        
            </div>
        </div>
    </div>
</div>
    
@endsection