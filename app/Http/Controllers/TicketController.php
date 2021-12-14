<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Ticket;
use http\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            $ticket_ref = $request->route('id');
            $reporter = $data[0]->name;
            return view('ticket/ticket-details',compact('data', 'cdata', 'csr', 'ticket_ref', 'reporter'));
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

    public function createTicket(Request $request) {
        $request->validate(['summary' =>'required','description' =>'required']);
        Ticket::create(['summary'=> request('summary'),
            'description'=> request('description'),
            'status'=>'Open',
            'raised_on'=> Carbon::now(),
            'raised_by'=> session()->get('username'),
            'assigned_to'=> '',
            'priority' =>'High'
        ]);
        return redirect('raise-ticket')->with('message','Ticket Raised Succesfully');
    }


    public function storeComments(Request $request) {
        if (isset($_POST['btnClose'])) {
            Ticket::where('id',request('ticket_id'))->update(array(
                'status'=>'Closed'
            ));
            return redirect('ticket-details/' . request('ticket_id'))->with('message', 'Ticket Closed');
        } else if(isset($_POST['btnDel'])) {
            Ticket::where('id', request('ticket_id'))->delete();
            return redirect('tickets-summary')->with('message', 'Ticket Deleted');
        }
        else if(isset($_POST['btnOpen'])) {
                Ticket::where('id',request('ticket_id'))->update(array(
                    'status'=>'Open'
                ));
                return redirect('ticket-details/' . request('ticket_id'))->with('message', 'Ticket Opened');
        }
        else {
            Comment::create(['ticket_ref' => request('ticket_id'),
                'comment_text' => request('comment'),
                'added_on' => Carbon::now(),
                'comment_by' => session()->get('name')
            ]);
            return redirect('ticket-details/' . request('ticket_id'))->with('message', 'Comment Saved Succesfully');
        }
    }

    public function mailTicket(Request $request) {
        $isSession = self::validateSession();
        if($isSession) {
            $csr = session()->get('CSRcheck');
            $cdata =  Comment::all()->where('ticket_ref', '=', $request->route('id'))->values();
            $data = DB::table('tickets')->join('users', 'tickets.raised_by', '=', 'users.email')->where('tickets.id', '=', $request->route('id'))->get()->first();
            $ticket_ref = $request->route('id');
            return view('ticket/mail-details',compact('data', 'cdata', 'csr', 'ticket_ref'));
        } else {
            return redirect('/');
        }
    }

    public function mailTicketDetails(Request $request) {
        if($request->ajax()) {
            $user = $request->input('user');
            $userEmail = $request->input('userEmail');
            $ticketId = $request->input('ticketId');
            $status = $request->input('status');
            $priority = $request->input('priority');
            $description = $request->input('description');
            $comments = $request->input('comments');
            $addedComment = $request->input('additionalComment');
            $data = ['name' => $user, 'raisedBy' => $userEmail, 'ticketId' => $ticketId, 'status'=> $status, 'priority' => $priority, 'description' => $description, 'comments' => $comments, 'addedComment' => $addedComment];
            Mail::send('email.help-mail', compact('data'), function($message) use ($ticketId) {
                $message->from(session()->get('username'));
                $message->to('7faa1089fb9860@mailtrap.io');
                $message->subject('Need help with ticket #' . $ticketId);
            });
            return "Done";
        }
    }
}
