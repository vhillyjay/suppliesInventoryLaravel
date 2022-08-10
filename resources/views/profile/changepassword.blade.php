@extends('layouts.bootstrap')
@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-lg-6">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Change password</h6>
            </div>
            <div class="card-body">
                <form action=" {{ route('profile.updatepassword') }} " method="POST">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <input type="password" class="form-control my-2" id="old_password" name="old_password" placeholder="Old Password" >
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- @/error is a blade directive which automatically detects error based on validation -->
                        <!-- $message is the output that will be shown on screen if validation is not passed -->
                        <!-- root lang/en/validation.php -->
                    <input type="password" class="form-control my-2" id="new_password" name="new_password" placeholder="New Password" >
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    <input type="password" class="form-control my-2" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm Password">
                    <div class="align-items-end">
                        <input type="submit" value="Change password" class="btn btn-outline-primary">
                        <!-- align end -->
                    </div>
                </form>             
            </div>
        </div>
    </div>
</div>
@endsection
<!-- if old pass is null = The old password field is required.
    if new pass is null = The new password field is required. 
    if confirm pass is null and old&new is not null = The new password confirmation does not match.
    if new and confirm is same validation passed-->