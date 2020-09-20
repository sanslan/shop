<?php

namespace App\Http\Middleware;

use Closure;

class StaffStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    const STAFF_ADMIN_ROLE_ID = 1;

    public function handle($request, Closure $next)
    {

        $role_id = auth('staff')->user()->role_id;
        if($role_id != self::STAFF_ADMIN_ROLE_ID ){
            return response()->json(['message' => 'Only staff with admin status has permission'],401);
        }
        return $next($request);
    }
}
