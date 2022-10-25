<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admin
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
    
        // $adminRole = Auth::user()->roles->pluck('name');
        // if($adminRole->contains('admin')){
        //     return $next($request);
        // }

        if (Auth::check() && Auth::user()->user_type == 'admin') {
            return $next($request);
        } else {
            return redirect('login');
        }

        // if(!auth()->check() || !auth()->user()->roles->pluck('name','admin')){
        //     return $next($request);
        // }
        
        // return redirect('/');

        // if(!auth()->check() || !auth()->user()->user_type == 'admin'){
        //     return redirect('/');
        // }
    }

}
