<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{


    public function resident()
    {
        return view('userRDC.resident');
    }


    public function nonResident()
    {
        return view('userRDC.nonResident');
    }


    public function payment(Request $request)
    {
        $cartData = Session::get('cart_data', []);
        
        return view('userRDC.payment', ['cartItems' => $cartData]);
    }


    public function payment2(Request $request)
    {
        $cartData = Session::get('cart_data', []);
        return view('userRDC.payment2', ['cartItems' => $cartData]);
    }

    public function store(Request $request)
    {
        $cartData = Session::get('cart_data');
        // Remove or comment out the dd() line after inspecting the structure
        
        if ($cartData) {
            foreach ($cartData as $cartItem) {
                // Check if the 'user_id' key exists in the current cart item
                if (isset($cartItem['user_id'])) {
                    $user_id = $cartItem['user_id'];
                } else {
                    // Handle the case where 'user_id' is not present
                    return redirect()->route('index')->with('error', 'User ID not found in cart data.');
                }

                // Extracting other data from the current cart item
                $serial_number = $cartItem['serial_number'];
                $ticket_type = $cartItem['ticket_type'];
                $quantity = $cartItem['quantity'];
                $purchase_date = $cartItem['purchase_date'];
                $validity_start = $cartItem['validity_start'];
                $validity_end = $cartItem['validity_end'];
                $status = $cartItem['status'];
                $price = $cartItem['price'];

                // Create a new ticket instance
                $ticket = Ticket::create([
                    'user_id' => $user_id,
                    'serial_number' => $serial_number,
                    'ticket_type' => $ticket_type,
                    'quantity' => $quantity,
                    'purchase_date' => $purchase_date,
                    'validity_start' => $validity_start,
                    'validity_end' => $validity_end,
                    'status' => $status,
                    'price' => $price,
                ]);
            }

            // Clear the cart data from the session
            Session::forget('cart_data');

            // Redirect or return a response as needed
            return view('userRDC.success');
        } else {
            // Handle the case where data is not present
            return redirect()->route('buyticket')->with('error', 'No cart data found.');
        }
    }




    private function removeCartData($serialNumber)
    {
        $cartData = Session::get('cart_data', []);

        // Find the index of the item with the specified serial number
        $indexToRemove = array_search($serialNumber, array_column($cartData, 'serial_number'));

        // If the item is found, remove it from the array
        if ($indexToRemove !== false) {
            unset($cartData[$indexToRemove]);

            // Reindex the array after removing the item
            $cartData = array_values($cartData);

            // Update the session with the new cart data
            Session::put('cart_data', $cartData);
        }
    }

    public function showPurchasedTicket()
    {
        $user_id = auth()->id();
        $tickets = Ticket::where('user_id', $user_id)->get();

        return view('userRDC.purchasedList', compact('tickets'));
    }
}
