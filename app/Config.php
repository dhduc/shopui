<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Config extends Model {
    protected $guarded = ['id'];
    protected $table = 'config';
    public $properties = array('title','logo','favicon','email','telephone','tax','ship','created_at','updated_at');
    public $timestamps = true;

}