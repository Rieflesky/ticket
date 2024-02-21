<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'ticket_type' => 'required|in:adult,children,adultNonResident,childrenNonResident',
            // Add more validation rules if needed
        ]);

        // Assuming the user is authenticated, you can retrieve the user ID
        $user_id = auth()->id();

        // Assuming you have a unique way to generate serial numbers
        $serial_number = uniqid();

        // Determine ticket type and price based on the input
        if ($request->input('ticket_type') == 'adult') {
            $ticket_type = 'Adult Resident';
            $price = ($request->input('quantity') == 1) ? 7.00 : 7.00 * $request->input('quantity');
        } elseif ($request->input('ticket_type') == 'children') {
            $ticket_type = 'Children Resident';
            $price = ($request->input('quantity') == 1) ? 3.00 : 3.00 * $request->input('quantity');
        } elseif ($request->input('ticket_type') == 'adultNonResident') {
            $ticket_type = 'Adult Non-Resident';
            $price = ($request->input('quantity') == 1) ? 20.00 : 20.00 * $request->input('quantity');
        } elseif ($request->input('ticket_type') == 'childrenNonResident') {
            $ticket_type = 'Children Non-Resident';
            $price = ($request->input('quantity') == 1) ? 10.00 : 10.00 * $request->input('quantity');
        } else {
            // Handle unexpected ticket types or other conditions
            return redirect()->back()->with('error', 'Invalid ticket type');
        }

        // Other fields
        $purchase_date = now();
        $validity_start = now();
        $validity_end = now();
        $status = 'Active';
        $payment_status = 'Pending';

        // Create a new cart item
        $cartItem = [
            'user_id' => $user_id,
            'serial_number' => $serial_number,
            'ticket_type' => $ticket_type,
            'quantity' => $request->input('quantity'),
            'purchase_date' => $purchase_date,
            'validity_start' => $validity_start,
            'validity_end' => $validity_end,
            'status' => $status,
            'price' => $price,
        ];

        // Retrieve existing cart data from the session
        $cartData = Session::get('cart_data', []);

        // Add the current item to the cart array
        $cartData[] = $cartItem;

        // Calculate total price
        $totalPrice = $this->calculateTotalPrice($cartData);

        // Update the session with the new cart data and total price
        Session::put('cart_data', $cartData);
        Session::put('total_price', $totalPrice);

        Session::flash('success', 'Ticket added to the cart!');
        
        return view('userRDC.cart', ['cartItems' => $cartData]);
    }

    // Function to calculate total price
    private function calculateTotalPrice($cartData)
    {
        $totalPrice = 0;

        foreach ($cartData as $item) {
            $totalPrice += $item['price'];
        }

        return $totalPrice;
    }


    public function show()
    {
        $cartData = Session::get('cart_data', []);

        // Pass the cart data to the view
        return view('userRDC.cart', ['cartItems' => $cartData]);
    }
    public function remove(Request $request)
    {
        $serialNumberToRemove = $request->input('serial_number'); // Assuming you pass the serial number in the request

        $cartData = Session::get('cart_data', []);

        // Find the index of the item with the specified serial number
        $indexToRemove = array_search($serialNumberToRemove, array_column($cartData, 'serial_number'));

        // If the item is found, remove it from the array and update total amount
        if ($indexToRemove !== false) {
            $removedItem = $cartData[$indexToRemove];
            $totalAmount = Session::get('total_price', 0);

            // Decrease the total amount by the price of the removed item
            $totalAmount -= $removedItem['price'];

            // Remove the item from the array
            unset($cartData[$indexToRemove]);

            // Reindex the array after removing the item
            $cartData = array_values($cartData);

            // Update the session with the new cart data and total amount
            Session::put('cart_data', $cartData);
            Session::put('total_price', $totalAmount);

            Session::flash('success', 'Item removed from the cart!');
        } else {
            Session::flash('error', 'Item not found in the cart.');
        }

        // Pass the updated cart data to the view
        return view('userRDC.cart', ['cartItems' => $cartData]);
    }

    
}
