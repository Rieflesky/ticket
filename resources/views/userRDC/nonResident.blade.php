<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template">

    <!-- title -->
    <title>Ticket Purchase</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="home/assets/css/main.css">
    <style>
        /* Add custom styles for the modal */
        .custom-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .btn-orange {
            color: #fff;
            background-color: #ff8c00;
            /* Orange color */
            /* Add other styles as needed */
        }

        .btn-orange:hover {
            background-color: #ff6b00;
            /* Darker orange on hover */
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Select Your Tickets</h2>
            </div>
            <br /><br /><br /><br /><br /><br />
            <div class="col-md-4 text-right">
                <a href="{{ route('cartShow') }}" class="btn btn-info">
                    <i class="fas fa-shopping-cart"></i> Cart
                </a>
                <a href={{ route('index') }} class="cart-btn"></i> Home</a>
            </div>
        </div>


        <!-- Non-Resident Tickets -->
        <div class="row">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">Adult (Non-Resident)</h3>
                        <p class="card-text">Per Person RM 20.00</p>
                        <form action="{{ route('cartStore') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ticket_type" value="adultNonResident">
                            <label for="adultNonResidentQuantity">Quantity:</label>
                            <input type="number" id="adultNonResidentQuantity" name="quantity" min="1"
                                value="1" required><br>
                            <button type="submit" class="btn btn-orange" data-toggle="modal" data-target="#cartModal">
                                <i class="fas fa-check"></i> Add to Cart
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h3 class="card-title">Children (Non-Resident)</h3>
                        <p class="card-text">Per Person RM 10.00</p>
                        <form action="{{ route('cartStore') }}" method="POST">
                            @csrf
                            <input type="hidden" name="ticket_type" value="childrenNonResident">
                            <label for="childrenNonResidentQuantity">Quantity:</label>
                            <input type="number" id="childrenNonResidentQuantity" name="quantity" min="1"
                                value="1" required><br>
                            <button type="submit" class="btn btn-orange" data-toggle="modal" data-target="#cartModal">
                                <i class="fas fa-check"></i> Add to Cart
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript for modal display -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting normally

                // Get the form data
                var formData = new FormData(this);

                // Perform your form submission logic here
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle the success response
                        var ticketType = formData.get('ticket_type');
                        $('#successMessage' + ticketType).fadeIn().delay(2000).fadeOut();
                        $('#cartModal').modal('show');
                    },
                    error: function(error) {
                        // Handle the error response
                        console.error('Form submission error:', error);
                    }
                });
            });
        });
    </script>



    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Item Added to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your selected item has been added to the cart successfully.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
