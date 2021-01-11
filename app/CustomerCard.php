<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;

class CustomerCard extends Model
{
	
    protected $table = "ig_customer_cards";

	protected $fillable = [
	    	'holder',
			'c_number',
			'validity',
	    ];
}