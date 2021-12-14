<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use function Illuminate\Events\queueable;

class AdminController extends Controller
{
    private function validateSession(): bool
    {
        $email = session()->get('username');
        if (isset($email) && trim($email) != '') {
            return true;
        } else {
            return false;
        }
    }

    //
    public function index()
    {
        $isSession = self::validateSession();
        if ($isSession) {
            $userData = User::all()->where('isAdmin', '=', 0)->values();
            return view('admin.all-users', compact('userData'));
        } else {
            return redirect('/');
        }

    }

    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->input('type') == 'customer' ? 1 : 0;
            $data = User::all()->where('isCustomer', '=', $type)->values();
            return view('admin.filtered-users')->with('data', $data);
        }
    }

    public function getOpenTickets(Request $request)
    {
        $isSession = self::validateSession();
        if ($isSession) {
            $openTickets = Ticket::all()->where('status', '=', 'Open')->values();
            $csr = User::all()->where('isCustomer', '=', 0)->where('isAdmin', '=', 0)->values();
            return view('admin.open-tickets', compact('openTickets', 'csr'));
        } else {
            return redirect('/');
        }
    }

    public function assignTicket(Request $request)
    {
        if ($request->ajax()) {
            $ticketId = $request->input('ticketId');
            $to = $request->input('to');
            $ticket = Ticket::all()->where('id', '=', $ticketId)->first();
            $ticket->update(['assigned_to' => $to]);
            $ticket->save();
            return "Done";
        }
    }

    public function newCsrSignup()
    {

        return view("admin.csraccount");
    }

    public function saveCsrProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc',
            'contact' => 'required|numeric',
            'password' => 'required|min:8|max:15|regex:/^[A-Za-z0-9@#*%$!]*$/',
        ]);

        $userData = $request->all();
        $userData['id'] = rand(0, 1000);
        $userData['isCustomer'] = 0;
        $userData['isAdmin'] = 0;
        $userData['address'] = "";
        User::create($userData);
        return redirect("/admin-all-users");
    }

    public function updateCsrAccount(Request $request)
    {
        $id = $request->route('id');
        $isSession = self::validateSession();
        if ($isSession) {

            $userData = User::all()->where('id', '=', $id);
            return view('admin/update-csraccount', ['userData' => $userData]);
        } else {
            return redirect('/');
        }
    }

    public function updatedCsrAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc',
            'contact' => 'required|numeric',
            'password' => 'required|min:8|max:15|regex:/^[A-Za-z0-9@#*%$!]*$/'
        ]);
        $updatedData = $request->all();
        $id = $request->input('id');
        $data = User::all()->where('id', '=', $id)->first();
        $data->update($updatedData);
        $data->save();
        return redirect("/admin-all-users");
    }

    public function deleteCsrAccount(Request $request)
    {
        $id = $request->route('id');
            $res = User::where('id', '=', $id)->delete();
            return redirect("/admin-all-users");



    }
}
