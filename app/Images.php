<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Images extends Model {
    protected $guarded = ['id'];
    protected $table = 'images';
    public $properties = array('id','productID','imageName','imageSrc', 'imageType');
    public $timestamps = true;


}