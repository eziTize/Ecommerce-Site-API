<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;
use App\User;

class Blog extends Model
{
	protected $table = "ig_blog";
    protected $appends = ['short_description'];

	public function getImageAttribute($value){
		return Asset($value);
	}

	public function getPublishedByAttribute($value){
		if(User::where('id',$value)->exists()){
			$user = User::where('id',$value)->first();
			return $user->name;
		}
	}

	public function getPublishedAtAttribute($value){
		return date('M d, Y',strtotime($value));
	}

	public function getShortDescriptionAttribute(){
		return Str::limit(strip_tags($this->description), 500, $end='...');
	}
}
