<?php

namespace Adam\Localization\Middleware;

use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            \App::setLocale(session()->get('locale'));
        }

        if (session()->has('locale:back') && \Route::current()->getPrefix() === config('localization.admin_prefix') ) {
            \App::setLocale(session()->get('locale:back'));
        }

        return $next($request);
    }
}
