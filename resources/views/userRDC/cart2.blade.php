<!DOCTYPE html>
<html lang="en">
<style>
    /* Common button styles */
    .btn {
        display: inline-block;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Success button style */
    .btn-success {
        color: #fff;
        background-color: #4CAF50;
        /* Green color for success */
    }

    .btn-success:hover {
        background-color: #45a049;
        /* Darker green on hover */
    }

    /* Danger button style */
    .btn-danger {
        color: #fff;
        background-color: #D9534F;
        /* Red color for danger */
    }

    .btn-danger:hover {
        background-color: #C9302C;
        /* Darker red on hover */
    }

    .table-body-row {
        background-color: #f8f9fa;
        /* Light gray background color */
        transition: background-color 0.3s ease;
    }

    .table-body-row:hover {
        background-color: #e9ecef;
        /* Lighter gray background on hover */
    }

    .table-body-row td {
        padding: 15px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template by Imran Hossain">
    <title>RDC</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ url('home/assets/css/main.css') }}">
    <link rel="stylesheet" href="home/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="home/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="home/assets/css/animate.css">
    <link rel="stylesheet" href="home/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="home/assets/css/main.css">
    <link rel="stylesheet" href="home/assets/css/responsive.css">
    <style>
        body {
            text-align: center;
        }

        .product-section {
            text-align: center;
        }

        .table {
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div class="product-section mt-150 mb-150 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title">
                        <h3><span class="orange-text">Your</span> Cart</h3>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead class="cart-table-head">
                <tr class="table-head-row">
                    <th class="product-name">Ticket Type</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-price">Total Price</th>
                    <th class="product-remove"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    @if (is_array($cartItem))
                        <tr class="table-body-row">
                            <td class="border-bottom-0 text-center">
                                <h6 class="fw-semibold mb-0">{{ $cartItem['ticket_type'] }}</h6>
                            </td>
                            <td class="border-bottom-0 text-center">
                                <p class="mb-0 fw-normal">{{ $cartItem['quantity'] }}</p>
                            </td>
                            <td class="border-bottom-0 text-center">
                                <p class="mb-0 fw-normal">RM{{ $cartItem['price'] }}</p>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('cartRemove', ['serial_number' => $cartItem['serial_number']]) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="cart-btn btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr class="table-body-row">
                    <td class="border-bottom-0 text-center">
                        <p class="mb-0 fw-normal">Total amount to pay:</p>
                    </td>
                    <td class="border-bottom-0 text-center"></td>
                    <td class="border-bottom-0 text-center">
                        <p class="mb-0 fw-normal">RM{{ number_format(session('total_price', 0), 2) }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br /><br/>

        <a href={{ route('nonResident') }} class="cart-btn"><i class="fas fa-shopping-cart"></i> Add ticket</a>
        <form method="GET" action="{{ route('payment') }}">
            @csrf
            <button type="submit" class="cart-btn btn btn-danger">Check Out</button>
        </form>
        <br /><br/><br/><br/>

        @include('home/footer')
        <!-- JavaScript -->
        <script src="home/assets/js/jquery-1.11.3.min.js"></script>
        <script src="home/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="home/assets/js/main.js"></script>


</body>

</html>
