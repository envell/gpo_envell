<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class VerifyStatistic
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     {
    public function handle($request, Closure $next)
    {
      $user = User::find(Auth::id());
      if (!$user->is('statistic')) {
          return "Not Have Permission To Access";
      }

      return $next($request);
    }
}