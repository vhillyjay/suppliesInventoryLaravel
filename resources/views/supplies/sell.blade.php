@extends('layouts.bootstrap')
@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sell item: {{ $sellItem->name }}</h6>
            </div>
            <div class="card-body">
                <!-- <form action="{{ route('supplies.sellupdate', $sellItem->id) }}" method="POST" enctype="multipart/form-data"> -->
                <form action="{{ route('transactions.sellupdate', $sellItem->id) }}" method="POST" enctype="multipart/form-data">    
                @csrf
                    @method('PUT')

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input type="text" 
                            disabled
                            id="" 
                            name="" 
                            value="{{ $sellItem->id }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="basic-addon1">
                    </div>
                                       
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" 
                            disabled
                            id="productName" 
                            name="productName" 
                            value="{{ $sellItem->name }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="basic-addon1">
                    </div>
                        @error('productName')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Type</span>
                        <input type="text" 
                            disabled
                            id="productType" 
                            name="productType" 
                            value="{{ $sellItem->type }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Brand</span>
                        <input type="text" 
                            disabled
                            id="productBrand" 
                            name="productBrand" 
                            value="{{ $sellItem->brand }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Price</span>
                        <input type="number" 
                            disabled
                            id="productPrice" 
                            name="productPrice" 
                            value="{{ $sellItem->price }}" 
                            step=".01" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="">
                    </div>
                        @error('productPrice')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Stocks Quantity</span>
                        <input type="number" 
                            disabled
                            id="productQuantity" 
                            name="productQuantity" 
                            value="{{ $sellItem->quantity }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="">
                    </div>

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Quantity/numbertosell</span>
                        <input type="number" 
                            id="productQuantity" 
                            name="productQuantity" 
                            value="" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="">
                    </div>
                        @error('productQuantity')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    
                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Sell to</span>
                        <input type="text"
                            id="sellTo"
                            name="sellTo"
                            value=""
                            class="form-control"
                            aria-label="" 
                            aria-describedby="">
                    </div>
                        @error('sellTo')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    <input type="submit" value="Sell" class="btn btn-outline-primary">
                    @if(session('sellFail'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('sellFail') }} 
                        </div>
                    @endif
                </form>        
            </div>
        </div>
    </div>
</div>
@endsection