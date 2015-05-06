<?php namespace App\Http\Middleware;

use Closure;

class BloggerMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->user()->type != 'blogger' && $request->user()->type != 'admin') {
			return redirect('/home');
		}

		return $next($request);
	}

}
