<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Permission extends Model {
    protected $guarded = ['id'];
    protected $table = 'permission';
    public $timestamps = true;
}