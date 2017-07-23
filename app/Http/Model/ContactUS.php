<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    //
	public $table = 'contact_us';
	
	public $fillable = ['name','email','message'];
}
