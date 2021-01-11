<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;

class ProductsMenu extends Model
{
	protected $table = "ig_products_menu";

	public function sub(){
        return $this->hasMany('App\ProductsMenu', 'parent_id');
    }
}
