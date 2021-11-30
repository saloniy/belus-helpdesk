<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class TicketController extends Controller
{
    private function validateSession(): bool {
        $email = session()->get('username');
        if(isset($email) && trim($email) != '') {
            return true;
        } else {
            return false;
        }
    }

    public function getTicketsSummary() {
        $isSession = self::validateSession();
        if($isSession ) {
                $csrCheck = session()->get('CSRcheck');
                if($csrCheck){
                    $data = Ticket::all()->where('assigned_to', '=', session()->get('username'));
                    return view('ticket/tickets-summaryCSR',['data' => $data]);
                }
                else {
                    $data = Ticket::all()->where('raised_by', '=', session()->get('username'));
                    return view('ticket/tickets-summary',['data' => $data]);
                }
            }
          else {
          return redirect('/');
        }
    }

    public function getTicketDetails() {
        $isSession = self::validateSession();
        if($isSession) {
            return view('ticket/ticket-details');
        } else {
            return redirect('/');
        }
    }

    public function raiseTicket() {
        $isSession = self::validateSession();
        if($isSession) {
            return view('ticket/raise-ticket');
        } else {
            return redirect('/');
        }
    }
}
