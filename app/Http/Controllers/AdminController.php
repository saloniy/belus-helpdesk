<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use function Illuminate\Events\queueable;

class AdminController extends Controller
{
    private function validateSession(): bool {
        $email = session()->get('username');
        if(isset($email) && trim($email) != '') {
            return true;
        } else {
            return false;
        }
    }
    //
    public function index(){
        $isSession = self::validateSession();
        if($isSession) {
            $userData = User::all();
            return view('admin.all-users', compact('userData'));
        } else {
            return redirect('/');
        }

    }

    public function filter(Request $request) {
        if($request->ajax()) {
            $type = $request->input('type') == 'customer' ? 1 : 0;
            $data = User::all()->where('isCustomer', '=', $type)->values();
            return view('admin.filtered-users')->with('data', $data);
        }
    }

    public function getOpenTickets(Request $request) {
        $isSession = self::validateSession();
        if($isSession) {
            $openTickets = Ticket::all()->where('status', '=', 'Open')->values();
            $csr = User::all()->where('isCustomer', '=', 0)->where('isAdmin', '=', 0)->values();
            return view('admin.open-tickets', compact('openTickets', 'csr'));
        } else {
            return redirect('/');
        }
    }

    public function assignTicket(Request $request){
        if($request->ajax()) {
            $ticketId = $request->input('ticketId');
            $to = $request->input('to');
            $ticket = Ticket::all()->where('id', '=', $ticketId)->first();
            $ticket->update(['assigned_to'=>$to]);
            $ticket->save();
            return "Done";
        }
    }
}
