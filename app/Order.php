<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model {
    protected $guarded = ['id'];
    protected $table = 'orders';
    public $properties = array('id','userID','customerID','datetime','total','note','status','created_at','updated_at');
    public $timestamps = true;




    public function getDataForPaginationAjax($dataRequest,$config, $type){
        // Config sort
        $sortBy = 'id';
        $sortOrder = 'asc';
        if(isset($dataRequest['sort'])) {
            $sort = $dataRequest['sort'];
            $sortColum = ['id','userID','customerID','datetime','total','note','status','created_at','updated_at'];
            $sortBy = (in_array(key($sort), $sortColum)) ? key($sort) : 'id';
            $sortOrder = current($sort);
        }


        if($type == "all"){
            $query = $this;
        }
        else if($type == "pending"){
            $query = $this->where('status', '=', "Pending");
        }
        else if($type == "on_hold"){
            $query = $this->where('status', '=', "On Hold");
        }
        else if($type == "closed"){
            $query = $this->where('status', '=', "Closed");
        }
        else if($type == "cancelled"){
            $query = $this->where('status', '=', "Cancelled");
        }


        $query = $query->where(function($query) use ($dataRequest){
            $query->where('id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('userID', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('customerID', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('datetime', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('total', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('note', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('created_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('updated_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
            ;
        });
        $queryGetTotal = $query;
        $total = $queryGetTotal->count();

        if($config['limit'] == -1){
            $rows = $query->orderBy($sortBy, $sortOrder)
                ->get();
        }
        else {
            $rows = $query->orderBy($sortBy, $sortOrder)
                ->skip($config['offset'])
                ->take($config['limit'])
                ->get();
        }

        return ['total'=> $total, 'rows'=>$rows];
    }


}