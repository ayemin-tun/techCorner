<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        .details p { margin: 5px 0; }
        .items { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .items th, .items td { border: 1px solid #ddd; padding: 8px; }
        .items th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Details</h1>
            <p>Order Number: {{ $order->id }}</p>
            <p>Date: {{ $order->created_at->format('d-m-Y') }}</p>
        </div>
        <div class="details">
            <h2>Shipping Address</h2>
            <p>Name: {{ $order->address->full_name }}</p>
            <p>Address: {{ $order->address->address }}</p>
            <p>City: {{ $order->address->city }}</p>
            <p>Phone: {{ $order->address->phone }}</p>
        </div>
        <div class="details">
            <h2>Order Summary</h2>
            <table class="items">
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ Number::currency($item->total_amount, 'USD') }}</td>
                    </tr>
                @endforeach
            </table>
            <p>Subtotal: {{ Number::currency($order->grand_total, 'USD') }}</p>
            <p>Discount: {{ Number::currency(0, 'USD') }}</p>
            <p>Shipping: {{ Number::currency(0, 'USD') }}</p>
            <p>Total: {{ Number::currency($order->grand_total, 'USD') }}</p>
        </div>
    </div>
</body>
</html>
