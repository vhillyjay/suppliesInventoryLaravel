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
    <div class="">
        CVS School Supplies <br>
        fakeEmail@dummy.com <br>
        Receipt No. {{ $transactionReceipt->id }} <br>
        Receipt Date: {{ $transactionReceipt->created_at }}
        {{ $transactionReceipt->product_name }} <br>

        @if($transactionReceipt->sell_to === NULL)
            Quantity bought:
                {{ $transactionReceipt->product_quantity  }} <br>
            Bought from:
                {{ $transactionReceipt->buy_from  }} <br>
        @elseif($transactionReceipt->buy_from === NULL)
            Quantity sold:
                {{ $transactionReceipt->product_quantity  }} <br>
            Sold to:
                {{ $transactionReceipt->sell_to  }} <br>
        @endif

        Price per piece {{ $transactionReceipt->product_price }} <br>
        Total Price {{ $transactionReceipt->transaction_price }} <br>
        Issued by {{ $transactionReceipt->issued_by }} <br>
    </div>
    
    <footer>
        <p>Printed by: {{ $printedBy }} </p>
    </footer>
</body>
</html>