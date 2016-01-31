<?php namespace App\Http\Controllers\Admin;;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Http\Requests\PermissionRequest;
use Lang;
use View;
use Route;
use DB;
use Input;

use App\Response;




class PermissionController extends Controller {
    public function __construct(){
        $this->middleware('auth');
        $title = 'Permission';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index()
    {
        // get all Roles
        $roles = App\Role::all();
        $allRole = "";
        foreach($roles as $role){
            $allRole .= "<th>".$role->role_name."</th>";
        }


        // get all Routes
        if(Route::getRoutes() == null) {
            return;
        }
        else {
            $routes = Route::getRoutes();
        }
        $allRoutes = array();
        foreach($routes as $value){
            $allRoutes[] = $value->getPath();
        }
        $routes = array_unique($allRoutes);


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


        $tableRoute = '';
        foreach ($routes as $route) {
            $tableRoute .= "<tr>";
            $tableRoute .= "<td>" . $route . "</td>";
            foreach ($roles as $role) {
                $input = $role->id . "|" . $route;
                if ($allRoutesInPermission == null) {
                    $tableRoute .= '<td><input type="checkbox" name="data[]" class="group-checkable" value="' . $input . '"></td>';
                }
                else if($role->role_name == 'Admin'){
                    $tableRoute .= '<td ><input type = "checkbox" name="data[]" class="group-checkable" checked="checked" onclick="this.checked=!this.checked;" value="' . $input . '"></td >';
                }
                else {
                        if (in_array($input, $allRoutesInPermission)) {
                            $tableRoute .= '<td ><input type = "checkbox" name="data[]" class="group-checkable" checked="checked" value="' . $input . '"></td >';
                        } else {
                            $tableRoute .= '<td ><input type = "checkbox" name="data[]" class="group-checkable" value="' . $input . '"></td >';
                        }
                    }

            }

            $tableRoute .= "<tr>";
        }

        // display result in a view
        return view('admin.permission.list')->with([
                'allRoles' => $allRole,
                'tableRoute' => $tableRoute
            ]);
    }
    public function store(PermissionRequest $request) {
        $dataForms = $request['data'];
        if($dataForms == null) return;
        App\Permission::truncate();
        $model = new App\Permission;
        foreach ($dataForms as $dataForm) {
            $dataSave[] = array('route' => $dataForm);
        }
        $model->insert($dataSave);
        return redirect()->action('Admin\PermissionController@index')->withSuccess(Lang::get('messages.update_success'));
    }

    public function edit($id) {

    }

    public function update(PermissionRequest $request, $id){



    }



}