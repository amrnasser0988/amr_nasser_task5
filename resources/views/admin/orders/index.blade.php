<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Orders</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->quantity * $order->product->price }}</td>
            <td>{{ $order->created_at->format('d-m-Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>