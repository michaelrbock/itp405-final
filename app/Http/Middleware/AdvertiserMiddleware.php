<?php namespace App\Http\Middleware;

use Closure;

class AdvertiserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user()->type != 'advertiser' && $request->user()->type != 'admin') {
			return redirect('/home');
		}

		return $next($request);
	}

}
