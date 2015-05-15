<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfAuthenticate {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (\Session::get('user')) {
			return redirect('/');
		}
		else {
			return $next($request);
		}
	}

}
