<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    private function validateSession(): bool {
        $email = session()->get('username');
        if(isset($email) && trim($email) != '') {
            return true;
        } else {
            return false;
        }
    }

    public function login() {
        $isSession = self::validateSession();
        if($isSession) {
            return redirect('/tickets-summary');
        } else {
            return view('auth/login');
        }
    }

    /**
     * Verify the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request){
        $incorrectPassword = 'The password is incorrect.';
        $invalidAccount = 'Email ID or Password entered is invalid.';
        $isCustomer = ($request->isCustomer == 1);

        if($isCustomer){
            $request->validate([
                'email' => 'required|email:rfc',
                'password' => 'required'
            ], [
                'email.required' => 'Please enter registered email.',
            ]);
            $data = User::all(['email','password','isCustomer', 'isAdmin'])->where('email', '=', $request->email)->where('password', '=', $request->password)->where('isCustomer', '=','1')->values();
        } else {
            $request->validate([
                'csrEmail' => 'required|email:rfc',
                'csrPassword' => 'required'
            ], [
                'csrEmail.required' => 'Please enter registered email.',
                'csrPassword.required' => 'The password field is required.'
            ]);
            $data = User::all(['email','password','isCustomer', 'isAdmin'])->where('email', '=', $request->csrEmail)->where('password', '=', $request->csrPassword)->where('isCustomer', '=','0')->values();
        }
        if(count($data) > 0) {
            session()->put('username', $isCustomer ? $request->email : $request->csrEmail);
            session()->put('CSRcheck', $isCustomer ? false : true);

            if(!$isCustomer && $data[0]['isAdmin'] == 1){
                return redirect('/admin-all-users');
            } else {
                return redirect('/tickets-summary');
            }
        } else if($isCustomer) {
             return redirect('/')->withErrors(['noAccount' => $invalidAccount])->withInput();
        } else if(!$isCustomer) {
             return redirect('/')->withErrors(['noCsrAccount' => $invalidAccount])->withInput();
        }
    }

    public function signup() {
        $isSession = self::validateSession();
         if($isSession) {
            return redirect('/tickets-summary');
        } else {
            return view('auth/signup');
        }
    }

    /**
     * Add the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newUserSignup(Request $request){
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc',
            'contact' => 'required|numeric',
            'password' => 'required|min:8|max:15|regex:/^[A-Za-z0-9@#*%$!]*$/',
            'cpassword' => 'required|same:password'
        ], [
            'cpassword.required' => 'Please confirm password',
            'cpassword.same' => 'The value should match the input password'
        ]);
        try {
            $data = $request->all();
            $data['id'] = rand(0,1000);
            $data['isCustomer'] = 1;
            $data['isAdmin'] = 0;
            $data['address'] = "";
            User::create($data);
            session()->put('username', $request->email);
            session()->put('CSRcheck', false);
            return redirect('/tickets-summary');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect('/signup')->withErrors(['emailExists' => 'The email ID is registered. Please proceed to login']);
            }
        }
    }

    public function logout() {
        session()->forget('username');
        return redirect('/');
    }

    public function profile() {
        $isSession = self::validateSession();
        if($isSession) {
            return view('auth/myprofile');
        } else {
            return redirect('/');
        }
    }
}
