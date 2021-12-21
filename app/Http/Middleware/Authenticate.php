<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Models\User;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->header('x-access-token');
        if ($this->auth->guard($guard)->guest()) {
            if(!$token)
            return redirect('/login');
        }
        try {            
            $user = $this->auth->user();
            if($token && !isset($user->role)) $user = User::where('api_token', $token)->first();
            if(!isset($user->role)) $user = $user->first();
            $request->role = $user->role;          
            $request->token = $user->api_token;
            $request->id = $user->id;            
            $user->save();
            $_SESSION['sessionid'] = $user->session;
        } catch (\Throwable $e) { // For PHP 7
            return redirect('/login');
        } 
        return $next($request);
    }
}
