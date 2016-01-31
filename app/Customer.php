<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['customerID'];
    protected $table = 'customer';
    public $properties = array('customerID','fullname','email','telephone','address','city', 'created_at', 'updated_at');
    public $timestamps = true;
}
