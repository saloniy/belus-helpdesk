<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Ticket;
use http\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

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

    public function getTicketDetails(Request $request) {
        $isSession = self::validateSession();
        if($isSession) {
            $csr = session()->get('CSRcheck');
            $cdata =  Comment::all()->where('ticket_ref', '=', $request->route('id'))->values();
            $data = DB::table('tickets')->join('users', 'tickets.raised_by', '=', 'users.email')->where('tickets.id', '=', $request->route('id'))->get()->values();
            return view('ticket/ticket-details',compact('data', 'cdata', 'csr'));
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
        'status'=>'Open',
        'raised_on'=> Carbon::now(),
        'raised_by'=> session()->get('username'),
        'priority' =>'High'
    ]);
        return redirect('raise-ticket')->with('message','Ticket Raised Succesfully');
    }


    public  function storeComments(Request $request){

        Comment::create(['ticket_ref'=> request('ticket_id'),
            'comment_text'=> request('comment'),
            'added_on'=> Carbon::now()
        ]);
        return redirect('ticket-details/'.request('ticket_id'))->with('message','Comment Saved Succesfully');
    }
}
