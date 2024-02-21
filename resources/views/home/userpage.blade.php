<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>RDC</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="home/assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="home/assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="home/assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="home/assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="home/assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="home/assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="home/assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="home/assets/css/responsive.css">
</head>

<body>

    <!-- PreLoader -->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!-- PreLoader Ends -->

    <!-- header -->
    @include('home.header')
    <!-- end header -->

    <!-- hero area -->
    @include('home.hero')
    <!-- end hero area -->

    <!-- features list section -->
    @include('home.features')
    <!-- end features list section -->

    <!-- info section -->
    @include('home.info')
    <!-- end info section -->

    <!-- footer -->
    @include('home.footer')
    <!-- end footer -->

    <!-- jquery -->
    <script src="home/assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="home/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="home/assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="home/assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="home/assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="home/assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="home/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="home/assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="home/assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="home/assets/js/main.js"></script>

   <!-- Modal -->
<div class="modal fade" id="ticketTypeModal" tabindex="-1" role="dialog" aria-labelledby="ticketTypeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticketTypeModalLabel">Select Ticket Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Choose whether you are a Resident or Non-Resident:</p>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mr-2"
                        onclick="selectTicketType('resident')">Resident</button>
                    <button type="button" class="btn btn-primary mr-2"
                        onclick="selectTicketType('nonResident')">Non-Resident</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        // Display the modal when clicking on "Buy Ticket"
        $(document).ready(function() {
            $('.boxed-btn').click(function() {
                $('#ticketTypeModal').modal('show');
            });
        });

        // Function to handle button clicks
        function selectTicketType(type) {
            // Handle the selected ticket type (e.g., redirect to the appropriate page)
            if (type === 'resident') {
                window.location.href = "{{ route('resident') }}";
            } else if (type === 'nonResident') {
                window.location.href = "{{ route('nonResident') }}";
            }
        }
    </script>
</body>

</html>
