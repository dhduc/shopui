<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Users;
use Lang;
use View;
use Route;
use App;


class UsersController extends Controller {


    public function __construct(){
        $this->middleware('auth');
        $title = 'Users Management';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);

        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,

        ));

    }
    public function index() {

        return view('admin.users.list');
    }

    public function create(){
        $roles = App\Role::all()->toArray();
        $listRole = array();
        foreach($roles as $role){
            $listRole[] = $role;
        }
        $allRole = "";
        foreach($listRole as $role){
            $allRole .= '<option value="'.$role['id'].'">'.$role['role_name'].'</option>';
        }
        return view('admin.users.create')->with(['allRole' => $allRole]);
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

        $model = new Users;
        $result = $model->getDataForPaginationAjax($dataRequest,$config);

        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action('admin/users', $item->id);
        }

        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();

        die(json_encode($data));
    }


    public function store(UserRequest $request) {
        $model=new Users();
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('Admin\UsersController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        $role_id = Users::find($id)->role_id;
        $role_name = App\Role::where('id', '=', $role_id)->value('role_name');
        $roles = App\Role::all()->toArray();
        $allRole = array();
        foreach($roles as $role){
            $allRole[] = $role;
        }
        $result = Users::find($id);
        $password = Users::find($id)->value('password');

        $listStatus = "";
        if($result['status'] == 1) {
            $listStatus .= '<option value = "1" selected> Actived</option >';
            $listStatus .= '<option value = "0" > Not Active </option >';
        }
        else{
            $listStatus .= '<option value = "1" > Actived</option >';
            $listStatus .= '<option value = "0" selected> Not Active </option >';
        }


        $listRole = "";
        foreach ($allRole as $role) {
            if ($role_id == $role['id']) {
                $listRole .= '<option value = "' . $role_id . '" selected >' . $role_name . '</option >';
            } else {
                $listRole .= '<option value = "' . $role['id'] . '" >' . $role['role_name'] . '</option >';
            }
        }

        return view('admin.users.edit', compact('result'))->with([ 'password' => $password, 'listStatus' => $listStatus, 'listRole' => $listRole]);

    }

    public function update(UserRequest $request, $id){

        $data = $request->all();
        $model = Users::find($id);
        autoAssignDataToProperty($model,$request->all());
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = time().$name .'.'.$extension;
            $request->file('avatar')->move(
                'images/avatar', $picture
            );
            $filename = 'images/avatar/'.$picture;
        }
        else{
           $image = $model->toArray();
            $filename = $image['avatar'];
        }

        $password = bcrypt($request->input('password'));
        $model->password = $password;
        $model->avatar = $filename;
        $model->save();
        return redirect()->action('Admin\UsersController@index')->withSuccess(Lang::get('messages.update_success'));

    }

    public function destroy($id){
        Users::find($id)->delete();
        return redirect_success('Admin\UsersController@index',Lang::get('messages.delete_success'));
    }

}

