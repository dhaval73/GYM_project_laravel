<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ReplayMail;
class AdminController extends Controller
{
    public function index(Request $request,$show = null)
    {   
        $search=$request['search_query']??"";

        if ($search == "") {
            if ($show == 2) {
                $contacts = Contact::where('mark_as_read', '=', false)->paginate(8);
            }elseif($show == 1){
                $contacts = Contact::where('mark_as_read', '=', true)->paginate(8);
            }
            elseif($show == 3){
                $contacts = Contact::onlyTrashed()->paginate(8);
            }
            else{
                $contacts = Contact::paginate(8);
            }
        } else {
            if ($show == 2) {
                $contacts = Contact::where('mark_as_read', '=', false)->where('name','LIKE',"%$search%")->orwhere('subject','LIKE',"%$search%")->paginate(8);
            }elseif($show == 1){
                $contacts = Contact::where('mark_as_read', '=', true)->where('name','LIKE',"%$search%")->orwhere('subject','LIKE',"%$search%")->paginate(8);
            }
            elseif($show == 3){
                $contacts = Contact::onlyTrashed()->where('name','LIKE',"%$search%")->orwhere('subject','LIKE',"%$search%")->paginate(8);
            }
            else{
                $contacts = Contact::where('name','LIKE',"%$search%")->orwhere('subject','LIKE',"%$search%")->paginate(8);
            }
        }
        
        $data=compact('contacts','show','search');
        return view('admin/home')->with($data);
    }

    public function message($id)
    {
        $contact=Contact::find($id);
        $previousUrl = url()->previous();
        $data=compact('contact','previousUrl');
        return view('Admin/message')->with($data);
    }
    public function messagereplay(Request $request,$id)
    {
        $request->validate(
            [
                'message'=>'required'
            ]
            );
        $contact=Contact::find($id);
        if (is_null($contact)) {
            return redirect()->back();

        }
        else {
            
        $mailData = [
            'name'=>$contact->name,
            'body' => $request['message'],
        ];
        $previousUrl=$request['previousUrl'];

        Mail::to($contact->email)->send(new ReplayMail($mailData));
        return redirect($previousUrl);
    }

    }
    public function messagemarkasread($markread,$id,Request $request)
    {
        $contact=Contact::find($id);
        if ($contact) {
            if ($markread == 1) {
                $contact->mark_as_read=true;
            } else {
                $contact->mark_as_read=false;
            }
            $contact->save();
        }
        else{
            $request->session()->flash('alert','Error! No message found please try again or contact devloper');
        }
        // return redirect('/admin/home'.$id);
        return redirect()->back();
    }
    
    public function messagetrash($id)
    {
        $contact=Contact::find($id);
        if (is_null($contact)) {
        } else {
            $contact->delete($id);            
        }
        // return redirect('/admin/home/3');
        return redirect()->back();
        
    }
    public function messagedelete($delete,$id)
    {
        // $contact=Contact::find($id);
        $contact = Contact::withTrashed()->where('id', $id)->first();
        if (is_null($contact)) {
        } else {
            if ($delete == 1) {
                $contact->forceDelete();           
            } else {
                $contact->restore();           
            }
            
        }
        return redirect('/admin/home/3');
        
    }
    
}
