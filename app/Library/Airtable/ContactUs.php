<?php
	
	namespace App\Library\Airtable;
	/**
	 * Created by PhpStorm.
	 * User: lkhraisat
	 * Date: 7/23/17
	 * Time: 6:39 AM
	 */
	use Armetiz\AirtableSDK\Airtable;
	use Config;
	class ContactUs
	{
		private $oAirtable;
		private $sTable='contactus';
		public function __construct ()
		{
			$this->oAirtable=new Airtable(Config::get('airtable.public_key'),Config::get('airtable.base_id'));
		
		}
		
		public function createRecord($sToName,$sToMail,$sBody)
		{
			$fields   = [
			
				"SenderName"             => $sToName,
				"SenderEmail"              =>$sToMail,
				"Message"                 => $sBody,
			];
			
			try {
				
				$this->oAirtable->createRecord ($this->sTable, $fields);
				return true;
			}catch (Exception $e){
				throw $e;
			}
			
		}
		
	}