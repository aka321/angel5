<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest() || ! $this->auth->user()->isAdmin()) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			} else {
				if ($this->auth->guest()) {
					$redirect = redirect()->guest('sign-in');
				} else {
					$redirect = redirect('/');
				}
				return $redirect->withErrors('You must be an administrator to view that page.');
			}
		}

		return $next($request);
	}
}
