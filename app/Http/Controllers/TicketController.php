<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        if($isSession) {
          return view('ticket/tickets-summary');
        } else {
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
