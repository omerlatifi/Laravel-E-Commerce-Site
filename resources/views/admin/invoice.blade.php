<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { width: 100%; padding: 20px; border: 1px solid #ddd; }
        .title { font-size: 24px; font-weight: bold; }
        .details { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
<div class="invoice-box">
        <div class="title">Invoice</div>
        <div class="details">
            <p><strong>Invoice No:</strong> {{ $data->id }}</p>
            <p><strong>Customer Name:</strong> {{ $data->name }}</p>
            <p><strong>Phone:</strong> {{ $data->phone }}</p>
            <p><strong>Address:</strong> {{ $data->address }}</p>
        </div>

       <table >
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Unit Price</th>
            
            </tr>
         
            <tr>
                <td>{{ $data->product->title }}</td>
                <td> <img height="50" width="30" src="products/{{ $data->product->image}}"></td>
                <td>${{ $data->product->price }}</td>
                
            </tr>
            <table></table>
</body>
</html>