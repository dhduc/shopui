<?php namespace App\Http\Controllers\Admin;;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Role;
use Lang;
use View;
use Route;


class RoleController extends Controller {
    public function __construct(){
        $this->middleware('auth');
        $title = 'Role Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index() {
        return view('admin.role.list');
    }

    public function create(){
        return view('admin.role.create');
    }

    public function getDataAjax(Request $request){
        $dataRequest = $request->all();
        $pageCurrent = $dataRequest['current'];
        $limit = $dataRequest['rowCount'];
        $offset = ($pageCurrent -1)*$limit;
        $config = array(
            'limit'=>$limit,
            'offset'=>$offset,
        );
        $model = new Role;
        $result = $model->getDataForPaginationAjax($dataRequest,$config);

        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action('admin/role', $item->id);
        }
        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();
        die(json_encode($data));
    }


    public function store(RoleRequest $request) {
        $model=new Role();
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('Admin\RoleController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        $result = Role::find($id);
        return view('admin.role.edit', compact('result'));
    }

    public function update(RoleRequest $request, $id){
        $data = $request->all();
        $model = Role::find($id);
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('Admin\RoleController@index')->withSuccess(Lang::get('messages.update_success'));
    }

    public function destroy($id){
        Role::find($id)->delete();
        return redirect_success('Admin\RoleController@index',Lang::get('messages.delete_success'));
    }

}