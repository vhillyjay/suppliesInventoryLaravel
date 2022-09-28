@extends('layouts.bootstrap')
@section('content')
    buy page <br>
    {{ $buyItem }}
<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Buy stocks for item: {{ $buyItem->name }}</h6>
            </div>
            <div class="card-body">
                <!-- <form action="{{ route('supplies.buyupdate', $buyItem->id) }}" method="POST" enctype="multipart/form-data"> -->
                <form action="{{ route('transactions.buyupdate', $buyItem->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input type="text" 
                            disabled
                            id="" 
                            name="" 
                            value="{{ $buyItem->id }}" 
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
                            value="{{ $buyItem->name }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="basic-addon1">
                    </div>
                        @error('productName')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Price</span>
                        <input type="number" 
                            disabled
                            id="productPrice" 
                            name="productPrice" 
                            value="{{ $buyItem->price }}" 
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
                            value="{{ $buyItem->quantity }}" 
                            class="form-control" 
                            aria-label="" 
                            aria-describedby="">
                    </div>

                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Quantity/numbertobuy</span>
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
                        <span class="input-group-text" id="">Buy from</span>
                        <input type="text"
                            id="buyFrom"
                            name="buyFrom"
                            value=""
                            class="form-control"
                            aria-label="" 
                            aria-describedby="">
                    </div>
                        @error('buyFrom')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    <input type="submit" value="Buy" class="btn btn-outline-primary">
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