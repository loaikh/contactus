<?php

namespace App\Http\Controllers;

use App\Http\Model\ContactUS;
use App\Http\Requests\ContactFormRequest;
use Config;

use App\Library\Mailer;

use App\Library\Airtable\ContactUs as Airtable;


class ContactController extends Controller
{
    //
	
	public function index()
	{
		
		
		return view('contact.index');
	}
	
	public function send(ContactFormRequest $oRequest)
	{
		try {
		ContactUS::create($oRequest->all());
		
		
			Mailer::Mailgun ($oRequest->name, $oRequest->email, 'Contact Us', $oRequest->message);
			$oContactUsAirTable = new Airtable();
			$oContactUsAirTable->createRecord($oRequest->name, $oRequest->email, $oRequest->message);
		}catch (Exception $e){
			Log::error($e->getMessage ());
		}
	
		return \Redirect::route('contact')
			->with('success', 'Thanks for contacting us!');
		
	}
}
