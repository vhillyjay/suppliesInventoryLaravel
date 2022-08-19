@extends('layouts.bootstrap')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card border-left-primary shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Lorem Ipsum</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                body
            </div>
        </div>
    </div>

    <!-- user info -->
    <div class="col-xl-8 col-lg-7">
        <div class="card border-left-primary shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="  " method="">
                                       
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">ID:</span>
                        <input type="text" id="" name="" disabled value="{{ Auth::user()->id }}" class="form-control" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" id="" name="" disabled value="{{ Auth::user()->name }}" class="form-control" aria-label="" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group my-2">
                        <span class="input-group-text" id="">Email</span>
                        <input type="text" id="" name="" disabled value="{{ Auth::user()->email }}" class="form-control" aria-label="" aria-describedby="">
                    </div>

                    <!-- <input type="submit" value="Submit" class="btn btn-outline-primary"> -->
                </form>
            </div>
        </div>
    </div>

</div>

@endsection