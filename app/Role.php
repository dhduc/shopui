<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model {
    protected $guarded = ['id'];
    protected $table = 'role';
    public $properties = array('id','role', 'role_name','created_at','updated_at');
    public $timestamps = true;




    public function getDataForPaginationAjax($dataRequest,$config){
        // Config sort
        $sortBy = 'id';
        $sortOrder = 'asc';
        if(isset($dataRequest['sort'])) {
            $sort = $dataRequest['sort'];
            $sortColum = ['id','role', 'role_name','created_at','updated_at'];
            $sortBy = (in_array(key($sort), $sortColum)) ? key($sort) : 'id';
            $sortOrder = current($sort);
        }

        $query = $this->where('id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
            ->orWhere('role', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
            ->orWhere('role_name', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
            ->orWhere('created_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
            ->orWhere('updated_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
        ;
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