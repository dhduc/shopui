<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use Illuminate\Http\Request;
use App\Pages;
use Lang;
use View;
use Route;


class PagesController extends Controller {


    public function __construct(){
        $title = 'Pages Content';
        $class_name= substr(__CLASS__,21);
        $action_name=substr(strrchr(Route::currentRouteAction(),"@"),1);
        View::share(array(
            'title'=> $title,
            'class_name'=> $class_name,
            'action_name'=> $action_name,
        ));

    }
    public function index() {
        return view('admin.pages.list');
    }

    public function create(){
        return view('admin.pages.create');
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

        $model = new Pages;
        $result = $model->getDataForPaginationAjax($dataRequest,$config);

        # Render field action
        foreach ($result['rows'] as $k => $item) {
            $result['rows'][$k]['action'] = create_field_action('admin/pages', $item->id);
        }

        $data['current'] = $pageCurrent;
        $data['rowCount'] = $limit;
        $data['total'] = $result['total'];
        $data['rows'] = $result['rows'];
        $data['_token'] = csrf_token();
        die(json_encode($data));
    }


    public function store(PagesRequest $request) {
        $model=new Pages();
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('Admin\PagesController@index')->withSuccess(Lang::get('messages.create_success'));
    }

    public function edit($id) {
        $result = Pages::find($id);
        return view('admin.pages.edit', compact('result'));
    }

    public function update(PagesRequest $request, $id){

        $data = $request->all();
        $model = Pages::find($id);
        autoAssignDataToProperty($model,$request->all());
        $model->save();
        return redirect()->action('Admin\PagesController@index')->withSuccess(Lang::get('messages.update_success'));

    }

    public function destroy($id){
        Pages::find($id)->delete();
        return redirect_success('Admin\PagesController@index',Lang::get('messages.delete_success'));
    }

}