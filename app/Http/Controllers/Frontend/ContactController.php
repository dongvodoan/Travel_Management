<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendContactRequest;
use Mail;
use Flash;
use App\Models\Activity;

class ContactController extends Controller
{
	/**
     * Display a page of the Contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $types = Activity::select('types_id')->distinct()->get();
    	return view('frontend.contacts.index', compact('types'));
    }

    /**
     * Send to mail.
     *
     * @param \Illuminate\Http\SendContactRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function send(SendContactRequest $request)
    {
        $input = $request->all();

        $human = $input['human'];

        if($human==2){
        	Mail::send('frontend.contacts.mail', $input, function($message){
	        	$message->to('vddongbk@gmail.com', 'Hanoi Travel')->subject('Contact');
	        	$message->from('Contact@gmail.com', 'Contact');
	        });

	        Flash::success('Send to mail successfully.');

        	return redirect(route('contacts.index'));
        } else {
        	Flash::error('Human verification fail.');

        	return redirect(route('contacts.index'));
        }
        
    }

}
