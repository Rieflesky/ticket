<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ticket;

class HomeController extends Controller
{

  
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        // dd($usertype);
        if($usertype=='1')
        {
            
            $users = User::all();
            $tickets = Ticket::all();
            return view('admin.home', compact('users','tickets'));
        }
        else
        {
            return view('home.userpage');
        }
    }

    public function changeStatus($ticket, $status)
    {
        $ticket = Ticket::find($ticket);
        $ticket->status = $status;
        $ticket->save();

        return redirect()->route('index');
    }
    
}
