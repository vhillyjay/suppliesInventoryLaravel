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
                <th>Transaction ID</th>
                <th>Supplies ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity Sold/Bought</th>
                <th>Transaction Price</th>
                <th>Sold To</th>
                <th>Bought From</th>
                <th>Issued By</th>
                <th>Issued Last</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactionsList as $transactionsListData)
            <tr>     
                <td>{{ $transactionsListData->id }}</td>             
                <td>{{ $transactionsListData->supplies_id }}</td>
                <td>{{ $transactionsListData->product_name }}</td>
                <td>{{ $transactionsListData->product_price }}</td>
                <td>{{ $transactionsListData->product_quantity }}</td>
                <td>{{ $transactionsListData->transaction_price }}</td>
                <td>{{ $transactionsListData->sell_to }}</td>
                <td>{{ $transactionsListData->buy_from }}</td>
                <td>{{ $transactionsListData->issued_by }}</td>
                <td>{{ $transactionsListData->created_at }}</td>
            </tr>                    
        @endforeach
        </tbody>
    </table>
    <footer>
        <p>Printed by: {{ $printedBy }} </p>
    </footer>
</body>
</html>