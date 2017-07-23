<?php
	namespace App\Library;
	/**
	 * Created by PhpStorm.
	 * User: lkhraisat
	 * Date: 7/23/17
	 * Time: 6:02 AM
	 */
	use  Mailgun\Mailgun;
	use Config;
	use Illuminate\Http\Request;
	class Mailer
	{
		public static function Mailgun($sToName,$sToMail,$sSubject,$sBody){
			
			try {
				$mgClient = new Mailgun(Config::get ('mailgun.public_key'));
				$domain = Config::get ('mailgun.domain');
				
				# Make the call to the client.
				$result = $mgClient->sendMessage ("$domain", array('from' => 'Mailgun Sandbox <postmaster@sandbox4b4b06124cc44757b8988fd24064eb0d.mailgun.org>', 'to' => $sToMail . ' <' . $sToMail . '>', 'subject' => $sSubject, 'text' => $sBody));
			}catch (Exception $e){
				throw $e;
			}
		}
		
		
	}