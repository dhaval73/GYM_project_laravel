<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend/contact');
    }
    public function store(Request $request)
    {
        $validator=$request->validate(
            [
                'name'=>'required|max:30',
                'mobile_no'=>'required|numeric|digits:10',
                'email' => 'required|email|max:60',
                'subject'=>'required|max:100',
                'message'=>'required'
            ]
        );
        $contact=new Contact;
        $contact->name=$request->name;
        $contact->mobile_no=$request->mobile_no;
        $contact->email=$request->email;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();
        $request->session()->flash('success','Your message has been sent successful');
        return redirect(route('home'));
    }
}
