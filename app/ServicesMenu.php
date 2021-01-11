<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;

class ServicesMenu extends Model
{
	protected $table = "ig_services_menu";

	public function sub(){
        return $this->hasMany('App\ServicesMenu', 'parent_id');
    }
}
