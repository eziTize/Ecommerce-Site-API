<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;
use Illuminate\Support\Str;

class OrderInquiry extends Model
{
    protected $table = "ig_orders_inq";
}