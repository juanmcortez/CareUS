<?php

namespace App\Http\Middleware;

use App;
use Auth;
use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()) {
            session()->put('locale', Auth::user()->persona->language);
            App::setLocale(session()->get('locale'));
        } else {
            if (session()->has('locale')) {
                App::setLocale(session()->get('locale'));
            } else {
                session()->put('locale', config('app.locale'));
                App::setLocale(session()->get('locale'));
            }
        }
        return $next($request);
    }
}
