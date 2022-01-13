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
use DB;

class UserListController extends Controller {

    public function __construct() {
        $this->middleware('UserRole');
    }

    public function index() {
        return view('user.userlist');
    }

    public function ajax_userlist() {

        $data = User::select(['id', 'name', 'email', 'created_at', 'updated_at'])
                ->where('role_id', '!=', 1)
                ->where('role_id', '!=', 2)
                ->where('status', '=', 1);
        return Datatables::of($data)
                        ->make(true);
        //  $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);
        //  return DataTables::of($users)->make();
        exit;
    }

    public function custome_ajax_userlist() {

        $response = array();
//        $page_show = 3;
        $page_show = $_POST['page_show'];
        $search = $_POST['search'];
        $page_id = $_POST['page_id'];
        $order = $_POST['order'];
        $colunm = $_POST['column'];

        if ($search != "") {
            $total_records = user::where("role_id", "=", "3")->where('name', 'like', '%' . $search . '%')->get()->count();
        } else {
            $total_records = user::where("role_id", "=", "3")->get()->count();
        }
        $total_pages_link = ceil($total_records / $page_show);

        $pagination_link = '<ul class="pagination">';
        $pagination_link .= '<li><a href="#" class="prev_next_button prevButton" >Previous</a></li>';

        if (!empty($total_pages_link)) {
            $l = 1;
            for ($i = 1; $i <= $total_pages_link; $i++) {
                if ($page_id == $i) {
                    $addclass = "active";
                } else {
                    $addclass = "";
                }
                $pagination_link .= ' <li class="' . $addclass . 'pageitem"  id="' . $i . '"><a href="#" class="page-link" data-id="' . $i . '">' . $i . '</a></li> ';
            }
        }
        if ($page_id < $total_pages_link) {
            $pagination_link .= '<li><a href="#" class="prev_next_button nextButton" >Next</a></li>';
        } else {
            $pagination_link .= '<li><a href="#" class="prev_next_button" >Next</a></li>';
        }


        $pagination_link .= '</ul">';

        if ($search != "") {
            $query = user::where("role_id", "=", "3")
                            ->where('name', 'like', '%' . $search . '%')
                            ->orderBy($colunm, $order)
                            ->skip(($page_id - 1) * $page_show)->take($page_show)->get();
        } else {
            $query = user::where("role_id", "=", "3")->orderBy($colunm, $order)->skip(($page_id - 1 ) * $page_show)->take($page_show)->get();
        }

        $output = "";
        if (count($query) != 0) {
            foreach ($query as $res) {
                $output .= "<tr>";
                $output .= "<td>" . $res['id'] . "</td>";
                $output .= "<td>" . $res['name'] . "</td>";
                $output .= "<td>" . $res['email'] . "</td>";
                $output .= "<td><img src='" . url("storage/" . $res['filepath']) . "'></td>";
                $output .= "<td>view</td>";
                $output .= "</tr>";
            }
            $response = array(
                "status" => true,
                "data" => $output,
                "pagination_link" => $pagination_link,
                "total_page_link" => $total_pages_link
            );
        } else {
            $response = array(
                "status" => false,
                "data" => "no data are available",
                "pagination_link" => $pagination_link,
                "total_page_link" => $total_pages_link
            );
        }
        return response()->json($response);
    }

}
