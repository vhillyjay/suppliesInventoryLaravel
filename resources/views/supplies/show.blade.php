@extends('layouts.bootstrap')
@section('content')
<!-- <div>
    <p> Supplies name - {{ $supplies->name }} </p> 
    <p> Supplies type - {{ $supplies->type }} </p>
    <p> Supplies brand - {{ $supplies->brand }} </p>
    <p> Supplies price - {{ $supplies->price }} </p>
    <p> Supplies quantity - {{ $supplies->quantity }} </p>
</div>
<div>
    
    <form action=" {{ route('supplies.destroy', $supplies->id) }} " method="POST">
        @csrf
        @method('DELETE')
        <button>Delete product</button>
    </form>
    
    <a href=" {{ route('supplies.edit', $supplies->id) }} ">update/edit</a>
</div> -->
    <!-- <form action="/supplies/{{ $supplies->id }}" method="POST"> -->
    <!-- <a href="/supplies/{{ $supplies->id }}/edit">update</a> -->

<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
            </div>
            <div class="card-body">
                <p> Supplies name - {{ $supplies->name }} </p> 
                <p> Supplies type - {{ $supplies->type }} </p>
                <p> Supplies brand - {{ $supplies->brand }} </p>
                <p> Supplies price - {{ $supplies->price }} </p>
                <p> Supplies quantity - {{ $supplies->quantity }} </p>

                    <!-- <a href="/supplies/{{ $supplies->id }}/edit">update</a> -->
                    <!-- <a href=" {{ route('supplies.edit', $supplies->id) }} " class="btn btn-outline-primary">Update</a> -->
                    
                    <!-- <form action="/supplies/{{ $supplies->id }}" method="POST"> -->
                    <form action=" {{ route('supplies.destroy', $supplies->id) }} " method="POST">
                    <a href=" {{ route('supplies.edit', $supplies->id) }} " class="btn btn-outline-primary">Update</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection