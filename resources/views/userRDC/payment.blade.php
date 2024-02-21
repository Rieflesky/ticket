<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .modal-content {
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="{{ route('payment2') }}" >
        @csrf
        <h1>Secure Payment</h1>

        <input type="hidden" name="cart_data" value="{{ json_encode($cartItems) }}">
        
        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" placeholder="Enter your card number" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" name="expiry_date" placeholder="MM/YY" required>

        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" placeholder="Enter CVV" required>

        <label for="amount">Amount:</label>
        <input type="text" name="amount" placeholder="Enter amount" required>

        <label for="bank">Select Bank:</label>
        <select name="bank" required>
            <option value="maybank">Maybank</option>
            <option value="bank_islam">Bank Islam</option>
            <option value="cimb">CIMB</option>
            <!-- Add more options for other banks -->
        </select>

        <button type="submit">Make Payment</button>
    </form>

   



</body>

</html>
