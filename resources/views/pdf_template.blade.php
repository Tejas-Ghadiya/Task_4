<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
            color: #666;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .table img {
            width: 50px;
            height: auto;
            border-radius: 3px;
        }

        .footer {
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Shop Details -->
        <div class="header">
            <h1>{{$title}}</h1>
            <p><strong>Shop Name:</strong>{{$shop_name}}</p>
            <p><strong>Address:</strong>{{$shop_address}}</p>
            <p><strong>Contact:</strong> {{$shop_email}} | +91{{$shop_phone}}</p>
            <p><strong>GST Number:</strong> GST123456789</p>
        </div>

        <!-- Buyer Details -->
        <div class="section">
            <h2>Billing Details</h2>
            <p><strong>Buyer Name:</strong> {{$uname}}</p>
            <p><strong>Email:</strong> {{$email}}</p>
            <p><strong>Contact Number:</strong> {{$mobile_number}}</p>
            <p><strong>Address:</strong> {{$address}}</p>
            <p><strong>Invoice Number:</strong> {{$invoice_number}}</p>
            <p><strong>Date:</strong>{{$date}}</p>
        </div>

        <!-- Product Table -->
        <div class="section">
            <h2>Order Summary</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="{{$image}}" alt="Wireless Headphones"></td>
                        <td>{{$product_name}}</td>
                        <td>{{$quantity}}</td>
                        <td>{{$product_price}}</td>
                        <td>{{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Billing Summary -->
        <div class="section">
            <h2>Payment Summary</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Total Amount</strong></td>
                        <td><strong>{{$total}}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for shopping with ShopEasy! Visit us again.</p>
            <p><em>This is a computer-generated invoice and does not require a signature.</em></p>
        </div>
    </div>
</body>
</html>
