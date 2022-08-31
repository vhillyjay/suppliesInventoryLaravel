@extends('layouts.bootstrap')
@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create New Product</h6>
            </div>
            <div class="card-body">
                <form action=" {{ route('supplies.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control my-2" id="productName" name="productName" placeholder="Name" >
                        @error('productName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <input type="text" class="form-control my-2" id="productType" name="productType" placeholder="Type" >
                    <input type="text" class="form-control my-2" id="productBrand" name="productBrand" placeholder="Brand">
                    <input type="number" class="form-control my-2" id="productPrice" name="productPrice" placeholder="Price" step=".01">
                        @error('productPrice')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <input type="number" class="form-control my-2" id="productQuantity" name="productQuantity" placeholder="Quantity">
                        @error('productQuantity')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    <input type="file" name="productImage" id="productImage">
                        @error('productImage')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    <div class="align-items-end">
                        <input type="submit" value="Submit" class="btn btn-outline-primary">
                        <!-- align end -->
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </form>             
            </div>
        </div>
    </div>
</div>
    
@endsection