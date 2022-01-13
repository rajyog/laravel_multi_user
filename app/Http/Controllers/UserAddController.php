<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Role;
use App\Models\location;
//use Datatables;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Rules\CheckLoginType;
use DB;

class UserAddController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
                DB::enableQueryLog();


        $role = Role::select('id', 'role_name')->where('id', '!=', 1)->get();
                               $quries = DB::getQueryLog();

       // dd($role);
       //dd($quries);
        $country = location::select('id', 'name')->where('parent_id', 0)->get();
        return view('admin.useradd', ["data" => $role, "country" => $country]);
    }

    public function postuserdata(Request $request) {
        $u_id = Auth::user()->id;
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:20',
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//                   'email' => [
//                        'required',
//                        'string', 'email', 'max:255',
//                        new CheckLoginType()
//                    ],
                    'roles' => 'required',
                    'password' => 'required',
                    'password_confirmation' => 'required',
                    'file' => 'required',
                    'gender' => 'required',
                    'country' => 'required',
                    'state' => 'required',
                    'city' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        $user = new User();
        $password = Hash::make($request['password']);
        $file = $request->file;
        //dd($file);
        $file_name = time() . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $file_name, 'public');
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role_id = $request['roles'];
        $user->password = $password;
        $user->filepath = $filePath;
        $user->gender = $request['gender'];
        $user->country = $request['country'];
        $user->state = $request['state'];
        $user->city = $request['city'];
        $user->addedby = $u_id;
        $user->login_type = '1';

        $result = $user->save();
        //dd($result);
        $register_data = array(
            'email' => $request['email'],
            'password' => $password
        );
        $details = [
            'title' => 'Mail from Online Web Tutor',
            'body' => 'Test mail sent by Laravel 8 using SMTP.',
            'data' => $register_data,
            'file' => storage_path('public/uploads/' . $file_name)
        ];
        if ($result == true) {
            $sendResult = userAddMailSend($details, $request['email']);
            // dd($sendResult);
            return redirect()->back();
        }
    }

    public function getstatedata(Request $request) {
        $response = array();
        $request = $request->all();
        $id = $request['id'];
        $get_state = location::select("id", "name")->where('parent_id', $id)->get();
        if (count($get_state) != 0) {
            $response = array(
                'status' => true,
                'data' => $get_state
            );
        } else {
            $response = array(
                'status' => false,
                'data' => $get_state
            );
        }
        return response()->json($response);
        exit;
    }

    public function getcitydata(Request $request) {
        $response = array();
        $request = $request->all();
        $id = $request['id'];
        $get_state = location::select("id", "name")->where('parent_id', $id)->get();
        if (count($get_state) != 0) {
            $response = array(
                'status' => true,
                'data' => $get_state
            );
        } else {
            $response = array(
                'status' => false,
                'data' => $get_state
            );
        }
        return response()->json($response);
        exit;
    }

    public function ajax_userdata() {
        $u_id = Auth::user()->id;
        $data = User::select(['id', 'name', 'email', 'created_at', 'updated_at', 'filepath'])
                ->where('role_id', '!=', 1)
                ->where('addedby', $u_id)
                ->where('status', '=', 1);
        return Datatables::of($data)
                        //->addIndexColumn()
                        ->addColumn('image', function ($row) {
                            //Storage::url("uploads/1639460639download.jpeg")
                            $html = '<img src="' . url('storage/' . $row->filepath) . '"/>';
                            return $html;
                        })
                        ->addColumn('action', function ($row) {

                            $html = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm deleteData" data-id="' . $row->id . '">delete</a>&nbsp;';
//                            $html .= '<a href="'.url('edit-user').'" class="edit btn btn-primary btn-sm">Edit</a>';
                            return $html;
                        })
                        ->rawColumns(['action', 'image'])
                        ->make(true);
        //  $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);
        //  return DataTables::of($users)->make();
        exit;
    }

    public function deleteuserdata(Request $request) {
        $response = array();
        $data = array();
        $request = $request->all();
        $id = $request['id'];
        $filepath = User::select('filepath')->where('id', '=', $id)->first();
        $userdelete = User::where('id', 222)
                ->update([
            'status' => 0
        ]);

        if ($userdelete == 1) {
            // unlink('storage/' . $filepath['filepath']);
            $response = array(
                'status' => true,
                'data' => $data
            );
        } else {
            $response = array(
                'status' => false,
                'data' => $data
            );
        }
        return response()->json($response);
        exit;
    }

//    public  function edit_user(){
//        
//    }
}
