<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        table, thead, th, td {
        border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Brand</th>
                <th>Price(PHP)</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
        @foreach($suppliesList as $suppliesListData)
            <tr>     
                <td>{{ $suppliesListData->id }}</td>             
                <td>{{ $suppliesListData->name }}</td>
                <td>{{ $suppliesListData->type }}</td>
                <td>{{ $suppliesListData->brand }}</td>
                <td>{{ $suppliesListData->price }}</td>
                <td>{{ $suppliesListData->quantity }}</td>
            </tr>                    
        @endforeach
        </tbody>
    </table>
    <footer>
        <p>Printed by: {{ $printedBy }} </p>
    </footer>
</body>
</html>