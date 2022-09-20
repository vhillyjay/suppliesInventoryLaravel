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

<div class="row justify-content-center"> <!--align-items-center-->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
            </div>
            <div class="card-body">
                <p> Product ID - {{ $supplies->id }} </p>
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
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Image</h6>
            </div>
            <div class="card-body">
                @if($supplies->image === NULL)
                    <div class="alert alert-danger text-center" role="alert">
                        Product does not have an image.
                    </div>
                @elseif(!empty($notFound))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ $notFound }}
                    </div>
                @else
                    <img src="{{ asset('img/product/'.$supplies->image) }}" 
                        alt="Product {{ $supplies->image }} image from storage"
                        style="height:150px" class="rounded mx-auto d-block">
                        <!-- for local/development purpose ==> img src="{{ asset('storage/img/product/'.$supplies->image) }}" -->
                        <!-- will look into public/storage/img/product/theImage -->
                        <!-- this is because of the connection link using php artisan storage:link -->
                    <br>
                    <a href="{{ route('supplies.downloadimage', $supplies->id) }}" class="btn btn-outline-primary">Download Image</a>
                    <p> {{ session('notify') }} </p>
                    @if(session('notFound'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('notFound') }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

</div>
@endsection