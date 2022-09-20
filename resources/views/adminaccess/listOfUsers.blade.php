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
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role(Admin=1, User=0)</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($listOfUsers as $listOfUsersData)
                        <tr>     
                            <td>{{ $listOfUsersData->id }}</td>             
                            <td>{{ $listOfUsersData->name }}</td>
                            <td>{{ $listOfUsersData->email }}</td>
                            <td>{{ $listOfUsersData->is_admin }}</td>
                        </tr>                    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
