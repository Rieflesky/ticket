<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Arial', sans-serif;
            padding-top: 50px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        h1 {
            color: #007bff;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-orange {
            background-color: #ff6600;
            color: #fff;
            border-color: #ff6600;
        }

        .btn-orange:hover {
            background-color: #cc5200;
            border-color: #cc5200;
        }

        .alert {
            margin-top: 20px;
        }

        .no-ticket {
            color: #6c757d;
        }

        .icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ticket Information <i class="fas fa-ticket-alt icon"></i></h1>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($tickets->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ticket Type</th>
                            <th>Quantity</th>
                            <th>Serial Number</th>
                            <th>Purchase Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->ticket_type }}</td>
                                <td>{{ $ticket->quantity }}</td>
                                <td>{{ $ticket->serial_number }}</td>
                                <td>{{ $ticket->purchase_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <a href="{{ route('index') }}" class="btn btn-orange">Home</a>
            </div>
        @else
            <div class="alert alert-info no-ticket">
                <h2>There are no purchased tickets.</h2>
            </div>
            <div class="text-center">
                <a href="{{ route('index') }}" class="btn btn-orange">Home</a>
            </div>
        @endif
    </div>
</body>
</html>

