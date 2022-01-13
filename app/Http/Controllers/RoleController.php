<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Validator;
use DB;

class RoleController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

//        $result = Role::count();
//        $total_page = ceil($result / 3);
        $result = Role::paginate(3);
        return view("admin.role", ['data' => $result]);
    }

    public function postRoledata(Request $request) {
        $validator = Validator::make($request->all(), [
                    'role_name' => 'required|unique:roles|max:20',
                    'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $role = new Role;
        $role->role_name = $request['role_name'];
        $role->description = $request['description'];
        $role->save();
        return redirect()->back();
    }

    public function listroledata(Request $request) {
        if ($request->ajax()) {
//            DB::enableQueryLog();
            $result = array();
            $response = array();
            $query = $request->get('query');
            $data = Role::select('id', 'role_name', 'description')
                    ->where('role_name', 'like', '%' . $query . '%')
                    ->paginate(3);
           
           
            //$quries = DB::getQueryLog();
//            dd(count($result));
//            if(count($result) != 0){
//                $response = array(
//                    "status" =>true,
//                    "data" =>$result
//                );
//            }else{
//                 $response = array(
//                    "status" =>true,
//                    "data" =>$result
//                );
//            }
            return view('user.rolepagination', ['data'=>$data])->render();
            //return view('user.rolepagination', $response);
        }
        exit;
    }

}
