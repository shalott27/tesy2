<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        //เพิ่ม if session is not login then กันเวลาที่ logout แล้วไม่ให้กลับไปหน้า dashboard ได้อีก
        if(!Session()->has('loginId')){
            return redirect('login')->with('fail', 'You have to login first!!');
        }

        
        return $next($request);
    }
}
