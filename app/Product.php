<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model {
    protected $guarded = ['id'];
    protected $table = 'product';
    public $properties = array('id','name','category_id','seller_id','cost','price','producer','description','information','number','purchase','status','created_at','updated_at');
    public $timestamps = true;


    public function bestSeller(){
        $sortBy = 'purchase';
        $sortOrder = 'desc';
        $offset = 0;
        $limit = 3;
        $rows = $this->orderBy($sortBy, $sortOrder)
            ->skip($offset)
            ->take($limit)
            ->get();

        return ['rows'=>$rows];
    }

    /* -------------------------------------- List All Product Follow Producer -------------------------------------- */
    public function getDataForProductList($dataRequest,$config, $type, $ID=""){
        // Config sort
        $sortBy = 'id';
        $sortOrder = 'desc';
        if(isset($dataRequest['sort'])) {
            $sort = $dataRequest['sort'];
            $sortColum = ['id','name', 'thumbnail', 'category_id','seller_id','cost','price','producer','description','information','number','purchase','status','created_at','updated_at'];
            $sortBy = (in_array(key($sort), $sortColum)) ? key($sort) : 'id';
            $sortOrder = current($sort);
        }

        if($type == "all"){
            $query = $this;
        }
        else if($type == "category"){
            //$query = $this->where('category_id', 'in', $ID);
            $data = explode(",", $ID);

            foreach($data as $index => $id){
                if($index == 0){
                    $query = $this->where('category_id', $id);
                }
                else {
                    $query = $query->orWhere('category_id', $id);
                }
            }

//            $query = $this->where('category_id', $data[0]);
//            $query = $query->orWhere('category_id', $data[1]);
        }
        else if($type == "producer"){
            $query = $this->where('producer', '=', $ID);
        }
        else if($type == "stock"){
            $query = $this->where('number', '>', 0);
        }
        else if($type == "closed"){
            $query = $this->where('number', '=', 0);
        }



        $query = $query->where(function ($query) use ($dataRequest) {
            $query->where('id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('name', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('category_id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('seller_id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('cost', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('price', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('description', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('information', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('purchase', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('status', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('created_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('updated_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%');
        });
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

    /* -------------------------------------- List All Product Stock -------------------------------------- */
    public function getDataForProductStock($dataRequest,$config){
        // Config sort
        $sortBy = 'id';
        $sortOrder = 'asc';
        if(isset($dataRequest['sort'])) {
            $sort = $dataRequest['sort'];
            $sortColum = ['id','name','category_id','seller_id','cost','price','description','information','number','purchase','status','created_at','updated_at'];
            $sortBy = (in_array(key($sort), $sortColum)) ? key($sort) : 'id';
            $sortOrder = current($sort);
        }

        $query = $this->where('number', '>', 0);

        $query = $query->where(function ($query) use ($dataRequest) {
            $query->where('id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('name', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('category_id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('seller_id', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('cost', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('price', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('description', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('information', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('number', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('purchase', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('status', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('created_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%')
                ->orWhere('updated_at', 'LIKE', '%'.$dataRequest['searchPhrase'].'%');
        });
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