<?php
use App\User;
use App\Role;
use Illuminate\Routing\Route;
function get_data($data, $field)
{
    $field_array = explode(',', $field);
    $temp = array();
    foreach ($field_array as $k => $v) {
        foreach ($data as $k2 => $v2) {
            if ($k2 == trim(strtolower($v))) {
                $temp[$k2] = $v2;
            }
        }
    }
    return $temp;
}



function autoAssignDataToProperty($model, $data)
{
    $properties = $model->properties;
    foreach ($properties as $property) {
        foreach ($data as $key => $value) {
            if ($key == $property) {
                $model->$property = $data[$key];
            } else {

            }
        }
    }
    //return $model;
}
function create_field_action($controller, $id) {
    return '<a class="btn-action" href="'.asset($controller.'/'.$id.'/edit').'"><i class="fa fa-edit fa-lg"></i></a>
            <a class="btn-action" href="'.asset($controller.'/'.$id.'/del').'"><i class="fa fa-trash fa-lg"></i></a>';
}
function create_field_action_list($controller, $id) {
    return '<a class="btn-action" href="'.asset($controller.'/'.$id.'/index').'"><i class="fa fa-list fa-lg"></i></a>
            <a class="btn-action" href="'.asset($controller.'/'.$id.'/edit').'"><i class="fa fa-edit fa-lg"></i></a>
            <a class="btn-action" href="'.asset($controller.'/'.$id.'/del').'"><i class="fa fa-trash fa-lg"></i></a>';
}
function del_action($controller, $id) {
    return '<a class="btn-action" href="'.asset($controller.'/'.$id.'/del').'"><i class="glyphicon glyphicon-remove"></i></a>';
}
function create_field_image($src, $attr ='') {
    return '<img src="'.asset($src).'" '.$attr.'>';
}

function create_field_status($status) {
    $str = '<span class="label label-sm label-success">Approved</span>';
    if($status == 0){
        $str = '<span class="label label-sm label-warning">Pending</span>';
    }
    return $str;
}

function price_formate($price) {
    return number_format($price,0,",",".");
}

/**
 * dump variable and exit
 * @param $var
 */
function adump($var){
    echo "<pre>";
    var_dump ($var);
    echo "</pre>";exit;
}

function setStatusOrder(){
    $result = "";
    $allStatus = array(
        1 => 'Pending',
        2 => 'Closed',
        3 => 'On Hold',
        4 => 'Fraud',
    );
    foreach($allStatus as $key => $value){
            $result .= "<option value='".$key."'>".$value."</option>";
    }
    return $result;
}

function getStatusOrder($status){
    $result = "";
    $allStatus = array(
        1 => 'Pending',
        2 => 'On Hold',
        3 => 'Cancelled',
        4 => 'Closed',
    );
    foreach($allStatus as $key => $value){
        if($status == $value){
            $result .= "<option value='".$value."' selected>".$value."</option>";
        }
        else {
            $result .= "<option value='".$value."'>".$value."</option>";
        }
    }
    return $result;
}

function checkMember(){
    $role_id = Auth::user()->role_id;
    $role_name = \App\Role::find($role_id)->role_name;
    if($role_name == "Member"){
        return true;
    }
    return false;
}
function checkPermission($route){
    $role_id = Auth::user()->role_id;
    $role_name = \App\Role::find($role_id)->role_name;
    $current_route = $route;
    $routes = $role_id."|".$current_route;
    // get all permission
    $permission = App\Permission::all()->toArray();
    $allRoutesInPermission = array();
    if (empty($permission)) {
        $allRoutesInPermission = null;
    }
    else {
        foreach ($permission as $value) {
            $allRoutesInPermission[] = $value['route'];
        }
    }
    if(in_array($routes, $allRoutesInPermission)){
        return true;
    }
    else {
        if($role_name == "Admin"){
            return true;
        }
        else if($current_route == 'admin/dashboard'){
            return true;
        }
        else {
            return false;
        }
    }
}


?>