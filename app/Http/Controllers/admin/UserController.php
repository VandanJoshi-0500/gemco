<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;
use App\Models\RoleUser;
use App\Models\Setting;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Nnjeim\World\World;

class UserController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function users(Request $request){
        $page = 'Customers';
        $icon = 'user.png';
        $users = User::where('role',3)->get();
        return view('admin.users.users',compact('icon','page','users'));
    }
    public function addUser(Request $request){
        $page = 'Users';
        $icon = 'user.png';
        $action =  World::countries();
        $groups = UserGroup::where('status',1)->get();
        if ($action->success) {
            $countries = $action->data;
        }else{
            $countries = '';
        }
        $action_states = World::states([
            'filters' => [
                'country_id' => 236,
            ],
        ]);
        if ($action_states->success) {
            $states = $action_states->data;
        }else{
            $states = '';
        }
        return view('admin.users.add_user',compact('page','icon','countries','states','groups'));
    }
    public function addUserData(Request $request){
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'phone'         => 'required|unique:users',
            'email'         => 'required',
            'password'      => 'required',
        ]);
        if($request->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        if($request->team_lead == "on"){
            $team_lead = 1;
        }else{
            $team_lead = 0;
        }
        $user = new User();
        $user->name                 = $request->first_name.' '.$request->last_name;
        $user->first_name           = $request->first_name;
        $user->last_name            = $request->last_name;
        $user->phone                = $request->phone;
        $user->mobile               = $request->mobile;
        $user->email                = $request->email;
        $user->role                 = $request->user_type;
        $user->team_lead            = $team_lead;
        $user->fax                  = $request->fax;
        $user->user_group           = $request->user_group;
        $user->discount_percentage  = $request->discount_percentage;
        $user->password             = Hash::make($request->password);
        $user->status               = 1;
        $insert                     = $user->save();

        $role   =   new RoleUser;
        $role->user_id  = $user->id;
        $role->role_id  = $request->user_type;
        $ins            = $role->save();
        if($insert){
            return redirect()->route('admin.users');
        }else{
            Session::flash('alert','Something Went Wrong.');
            return redirect()->route('admin.add.user');
        }
    }
    public function editUser(Request $request, $id = NULL){
        $page = 'Users';
        $icon = 'user.png';
        $user = User::where('id',$id)->first();
        $action =  World::countries();
        if ($action->success) {
            $countries = $action->data;
        }else{
            $countries = '';
        }
        $action_states = World::states([
            'filters' => [
                'country_id' => $user->country,
            ],
        ]);
        if ($action_states->success) {
            $states = $action_states->data;
        }else{
            $states = '';
        }
        $groups = UserGroup::where('status',1)->get();
        return view('admin.users.edit_user',compact('page','icon','user','countries','states','groups'));
    }

    public function updateUser(Request $req){

        $req->validate([
            'first_name'          => 'required',
            'last_name'           => 'required',
            'email'               => 'required',
            'phone'               => 'required',
            'streetaddress'     => 'required',
            'city'              => 'required',
            'state'             => 'required|not_in:0',
            'country'           => 'required|not_in:0',
            'zipcode'           => 'required',
        ]);
        if($req->status == "on"){
            $status = 1;
        }else{
            $status = 0;
        }
        $user = User::where('id',$req->user_id)->first();
        $user->name                 = $req->first_name.' '.$req->last_name;
        $user->first_name           = $req->first_name;
        $user->last_name            = $req->last_name;
        $user->phone                = $req->phone;
        $user->email                = $req->email;
        $user->company              = $req->company;
        $user->website              = $req->website;
        $user->zipcode              = $req->zipcode;
        $user->streetaddress        = $req->streetaddress;
        $user->city                 = $req->city;
        $user->state                = $req->state;
        $user->country              = $req->country;
        $user->fax                  = $req->fax;
        $user->user_group           = $req->user_group;
        $user->discount_percentage  = $req->discount_percentage;
        if($req->has('password') && $req->password != ''){
            $user->password         = Hash::make($req->password);
        }
        $user->status               = $status;
        $insert                     = $user->save();
        return redirect()->route('admin.users');
    }
    public function deleteUser($id){
        $user = User::where('id',$id)->first();
        $user->delete();
        return 1;
    }
    public function stateByCountry(Request $request, $id = NULL){
        $action_states = World::states([
            'filters' => [
                'country_id' => $id,
            ],
        ]);
        if ($action_states->success) {
            $states = $action_states->data;
        }else{
            $states = '';
        }
        $html = '';
        $html .= '<option value="0">Select State...</option>';
        if(!blank($states)){
            foreach($states as $state){
                $html .= '<option value="'.$state['id'].'">'.$state['name'].'</option>';
            }
        }
        return response()->json($html);
    }
}
