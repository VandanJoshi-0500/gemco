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
use App\Models\CatalogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class CatalogRequestsController extends Controller
{
    public function __construct() {
        $setting=Setting::first();
        $user = User::first();
        view()->share('setting', $setting);
    }
    public function catalogRequests(Request $request){
        $page = 'Catalog Requests';
        $icon = 'user.png';
        $catalog_requests = CatalogRequest::all();
        return view('admin.catalog-requests.index',compact('icon','page','catalog_requests'));
    }
    public function catalogRequestsView(Request $request, $id = NULL){
        $page = 'Catalog Requests';
        $icon = 'user.png';
        $catalog_request_details = CatalogRequest::findOrFail($id);
        return view('admin.catalog-requests.details',compact('icon','page','catalog_request_details'));
    }
}
