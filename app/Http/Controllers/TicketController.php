<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function getTicketsSummary() {
        return view('ticket/tickets-summary');
    }
    public function getTicketDetails() {
        return view('ticket/ticket-details');
    }
    public function raiseTicket() {
        return view('ticket/raise-ticket');
    }
}
