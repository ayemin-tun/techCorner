<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: 'Noto Sans Myanmar';
            font-style: normal;
        }

        .text-header {
            font-size: 15px;
            color: black;
            opacity: 0.7;
        }

        .address-detail {
            padding-bottom: 15px;
            border-bottom: 1px solid gray;
        }

        .address-detail p {
            margin: 0;
        }

        .item-container {
            border-collapse: collapse;
            border-bottom: 1px solid gray;
            width: 100%;
        }

        .item-container tr {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .item-container td {
            padding: 15px 0;
            width: 19%;
            text-align: start;
        }

        .item-container td p {
            margin-bottom: 5px;
        }

        .order-container {
            border-collapse: collapse;
            width: 100%;
        }

        .order-container td {
            padding: 15px 0;
            width: 45%;
            text-align: start;
            vertical-align: top;
            /* Add this line */
        }

        .order-table {
            border-collapse: collapse;
            width: 90%;
        }

        .order-table tr {
            margin: 5px;
        }

        .order-table tr td {
            margin: none;
            padding: 4px;
        }

        .footer {
            margin-top: 20px;
            font-size: 9px;
            text-align: right;
        }

        .footer h3 {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h4 class="text-header">Thank you. Your order has been received.</h4>
        <div class="address-detail">
            <p style="font-size: 13px;font-weight:bold;opacity: 0.8;margin-bottom: 5px;">{{$order->address->full_name}}</p>
            <p style="font-size:10px;">{{$order->address->address}}</p>
            <p style="font-size:10px;">{{$order->address->city}}</p>
            <p style="font-size:10px;">Phone: {{$order->address->phone}}</p>
        </div>
        <table class="item-container">
            <tr>
                <td>
                    <p style="font-size:10px;">Order Number:</p>
                    <span style="font-size:9px;font-weight:bold;padding-bottom: 10px;">{{$order->id}}</span>
                </td>
                <td>
                    <p style="font-size:10px;">Date:</p>
                    <span style="font-size:9px;font-weight:bold;">{{$order->created_at->format('d-m-Y')}}</span>
                </td>
                <td>
                    <p style="font-size:10px;"> Total::</p>
                    <span style="font-size:9px;font-weight:bold;color:blue;">{{Number::currency($order->grand_total,'USD')}}</span>
                </td>
                <td>
                    <p style="font-size:10px;">Payment Method:</p>
                    <span style="font-size:9px;font-weight:bold;">{{$order->payment_method ==='cod'?'Cash on Delievery':"Card"}}</span>
                </td>
                <td>
                    <p style="font-size:10px;">Payment Status:</p>
                    <span style="font-size:9px;font-weight:bold;">{{$order->payment_status}}</span>
                </td>
            </tr>
        </table>

        <table class="order-container">
            <tr>
                <td>
                    <h3 style="font-size: 13px;font-weight:bold;opacity: 0.8;margin-bottom: 10px;">Order details</h3>
                    <table style="width:80%" class="order-table">
                        <tr style="margin: 0;">
                            <td style="margin: 3px; font-size: 10px; opacity: 0.8;">Subtotal</td>
                            <td style="font-size: 10px; opacity: 0.8;text-align: right;">{{Number::currency($order->grand_total,'USD')}}</td>
                        </tr>
                        <tr>
                            <td style="margin: 3px; font-size: 10px; opacity: 0.8;">Discount</td>
                            <td style="font-size: 10px; opacity: 0.8;text-align: right;">{{Number::currency(0,'USD')}}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid gray; margin-bottom: 4px;">
                            <td style="margin: 3px; font-size: 10px; opacity: 0.8; padding-bottom: 5px;">Shipping</td>
                            <td style="font-size: 10px; opacity: 0.8;text-align: right; padding-bottom: 5px;">{{Number::currency(0,'USD')}}</td>
                        </tr>
                        <tr>
                            <td style="margin: 3px; font-size: 10px; opacity: 0.8;font-weight: bold; padding-top: 10px;">Total</td>
                            <td style="font-size: 10px; opacity: 0.8; text-align: right;padding-top: 10px;">{{Number::currency($order->grand_total,'USD')}}</td>
                        </tr>
                    </table>

                </td>
                <td>
                    <h3 style="font-size: 13px;font-weight:bold;opacity: 0.8;margin-bottom: 10px;">Shipping</h3>
                    <table style="width:80%" class="order-table">
                        <tr style="margin: 0;">
                            <td style="margin: 3px; font-size: 10px; opacity: 0.8;">Delivery</td>
                            <td style="font-size: 10px; opacity: 0.8;text-align: right;">{{Number::currency(0,'USD')}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="footer">
            <h3 style="color:blue">TechCorner</h3>
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>