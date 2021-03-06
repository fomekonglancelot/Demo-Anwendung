<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale')[0]);
        } else {
            $availableLangs = ['us', 'de', 'en'];
            $userLangs = preg_split('/,|;/', $request->server('HTTP_ACCEPT_LANGUAGE'));

            foreach ($availableLangs as $lang) {
                if (in_array($lang, $userLangs)) {
                    App::setLocale($lang);
                    Session::push('locale', $lang);
                    break;
                }
            }

        }

        return $next($request);
    }
}
