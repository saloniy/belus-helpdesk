<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function getContact() {

                    return view('/contactus');


    }
    public  function contactUs(Request $request){
        $request->validate(['name' =>'required','email' =>'required','subject' =>'required','message' =>'required']);
        Contact::create(['name'=>  request('name'),
            'email'=> request('email'),
            'subject'=> request('subject'),
            'message'=>  request('message')
        ]);
        return redirect('contactus')->with('message','Message Send');
    }
    public function aboutUs() {

        return view('/aboutus');


    }
    public function faq() {

        return view('/faq');
    }
}
