<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Models\Panel\Staff\Navigation;

class NavigationController extends Controller
{
    private const STAFF_ADMIN_ROLE_ID = 1;

    public function getNavigation(){

        $user_role_id = auth()->user()->role_id;
        if($user_role_id == self::STAFF_ADMIN_ROLE_ID){
            $navigation = Navigation::where('parent_id',0)->with('sub')->get();
        }
        $navigation =  Navigation::where('role_id',0)->where('parent_id',0)->with('sub')->get();

        return response()->json(['data' => $navigation,'status' => 'success']);
    }
}
