<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = ['ID'];
    protected $table = 'orderdetail';
    public $properties = array('ID','orderID','productID', 'pName','pPrice','pQty','total', 'created_at', 'updated_at');
    public $timestamps = true;
}
