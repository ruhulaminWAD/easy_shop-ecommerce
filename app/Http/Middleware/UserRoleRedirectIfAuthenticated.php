<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class UserRoleRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $expireTime = Carbon::now()->addSecond(30);
            Cache::put('user-is-online'. Auth::user()->id, true, $expireTime);
            User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }


        if (!Auth::guard('admin')->user()->brand) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->category) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->product) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->slider) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->coupon) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->shipping_area) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->blog) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->setting) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->all_user) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->return_order) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->order) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->report) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->stock) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->review) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }

        if (!Auth::guard('admin')->user()->adminuserrole) {
            Session::flash('warning', "You don't have permission to perfore this action");
            return redirect()->back();
        }else {
            return $next($request);
        }
        
        
    }
}
