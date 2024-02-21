<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter TAC Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3CB371; /* Changed background color to green */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #FFA500;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #FFA500;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #FF8C00;
        }
    </style>
</head>

<body>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <h1>Enter TAC Code</h1>
        <input type="hidden" name="cart_data" value="{{ json_encode($cartItems) }}">
        <label for="tac_code">TAC Code:</label>
        <input type="text" name="tac_code" placeholder="Enter TAC Code" required>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
