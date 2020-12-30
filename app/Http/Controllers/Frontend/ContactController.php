<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactMail;
use Alert;

class ContactController extends Controller
{

	public function contact(Request $request) {
		return view('frontend.contact');
	}

    public function contactEmail(Request $request) {
    	$data = $request->all();
    	$data = array(
    		'email' => $data['email'],
           	'name' => $data['name'],
           	'message' => $data['message']
       	);

        Mail::to(EMAIL)->send(new ContactMail($data));
        Alert::success('successfully send email');
        return redirect('contact');
    }
}
