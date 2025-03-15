<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use App\Models\UserGroup;
use App\Models\RoleUser;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class UserGroupController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function userGroups(Request $request){
        $page = 'Customer Groups';
        $icon = 'user.png';
        $groups = UserGroup::where('active',1)->get();
        return view('admin.user_groups.groups',compact('icon','page','groups'));
    }
    public function addUserGroup(Request $request){
        $page = 'Groups';
        $icon = 'user.png';
        return view('admin.user_groups.add_group',compact('page','icon'));
    }
    public function addUserGroupData(Request $request){
        $request->validate([
            'name'          => 'required',
            'tax_class'     => 'required',
        ]);
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $group = new UserGroup();
        $group->name   = $request->name;
        $group->tax_class    = $request->tax_class;
        $group->status       = 1;
        $group->active       = 1;
        $insert             = $group->save();

        if($insert){
            return redirect()->route('admin.user.groups');
        }else{
            Session::flash('alert','Something Went Wrong.');
            return redirect()->route('admin.add.group');
        }
    }
    public function deleteGroup($id){
        $group = UserGroup::where('id',$id)->first();
        $group->delete();
        return 1;
    }
    public function editGroup(Request $request, $id = NULL){
        $page = 'User Group';
        $icon = 'user.png';
        $group = UserGroup::where('id',$id)->first();
        return view('admin.user_groups.edit_group',compact('page','icon','group'));
    }
    public function updateGroup(Request $req){
        $req->validate([
            'name'          => 'required',
            'tax_class'     => 'required'
        ]);
        if($req->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $group = UserGroup::where('id',$req->group_id)->first();
        $group->name            = $req->name;
        $group->tax_class       = $req->tax_class;
        $group->status          = $status;
        $insert                 = $group->save();
        return redirect()->route('admin.user.groups');
    }
}
