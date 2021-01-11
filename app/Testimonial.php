<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;

class Testimonial extends Model
{
	protected $table = "ig_testimonial";

	public function getImageAttribute($value){
		return Asset($value);
	}
}
