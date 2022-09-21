@extends('layouts.bootstrap')
@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List of Users</h1>
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of current data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role(Admin=1, User=0)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role(Admin=1, User=0)</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($listOfUsers as $listOfUsersData)
                        <tr>     
                            <td>{{ $listOfUsersData->id }}</td>             
                            <td>{{ $listOfUsersData->name }}</td>
                            <td>{{ $listOfUsersData->email }}</td>
                            <td>{{ $listOfUsersData->is_admin }}</td>
                            <td>
                                <form action="{{ route('adminaccess.destroyusers', $listOfUsersData->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        @if($listOfUsersData->is_admin === 0)
                                            <button class="btn btn-outline-danger">Delete</button>
                                            <button class="btn btn-outline-success">Change</button> 
                                                <!-- not yet working -->
                                        @elseif($listOfUsersData->is_admin === 1)
                                            <div class="" data-toggle="tooltip" title="Unable to delete co-admin">
                                                <button type="button"
                                                    class="btn btn-outline-danger" 
                                                    disabled>
                                                        Delete
                                                </button>
                                            </div>
                                            <!-- <button type="button"
                                                class="btn btn-outline-danger" 
                                                disabled
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Unable to delete co-admin">
                                                    Delete
                                            </button> -->
                                        @endif
                                </form>
                                <a href="">Change</a>
                            </td>
                        </tr>                    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if(session('userDeletion'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('userDeletion') }}
        </div>
    @endif

@endsection
