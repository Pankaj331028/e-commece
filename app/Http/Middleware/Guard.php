<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guard
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
    //     echo "<pre>";
    //     print_r()
    //    foreach($request as $key => $req) {
    //     echo $key;
    //    print_r($req);
    //    die;
    //    }
    //     die;
        // echo"<pre>";
        // print_r($user);
        // die();
        // session()->has('user_id')
        //$id = Auth::id(); 
        // echo $loginPath = $request->route()->getName();
        // die;
        // $allowedPath =  ['login.index', 'index'];

        if(Auth::user()){
            return $next($request);
        }else{
            // return redirect('admin/')->with('error','You have not admin access');no-access
            return redirect('no-access');
        }
       
    }
}
