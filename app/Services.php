<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;

class Services extends Model
{
	protected $table = "ig_services";

	public function getImageAttribute($value){
		if(file_exists(Asset($value))){
			$image = Asset($value);
		}else{
			$image = Asset('uploads/no_image.jpg');
		}

		return $image;
	}
}
