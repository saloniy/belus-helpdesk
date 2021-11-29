<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

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
                    return view('ticket/tickets-summary');
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
        $email = session()->get('username');
        if($isSession) {
            return view('ticket/raise-ticket',compact('email'));
        } else {
            return redirect('/');
        }

    }

    public  function createTicket(Request $request){
     $request->validate(['summary' =>'required','description' =>'required']);
    Ticket::create(['summary'=> request('summary'),
        'description'=> request('description'),
        'status'=>'open',
        'raised_on'=> Carbon::now(),
        'raised_by'=> session()->get('username'),
        'priority' =>'High'
    ]);
        return redirect('raise-ticket')->with('message','Ticket Raised Succesfully');
    }
}
