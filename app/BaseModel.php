<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class BaseModel extends Model {

	protected $encrypt = [];

	public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encrypt)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {

        if (in_array($key, $this->encrypt)) {
             
             return Crypt::decrypt($this->attributes[$key]);
        }
        
        return parent::getAttribute($key);
    }

    public function attributesToArray()
    {
    	$attributes = parent::attributesToArray();
    	foreach ($attributes as $key => $value) {
    		if (in_array($key, $this->encrypt))
    		{
    			$attributes[$key] = Crypt::decrypt($value);

    		}
    	}

    	return $attributes;
    }
}
