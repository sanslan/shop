<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index(){
        return Auth::guard('staff')->user();
    }
}
