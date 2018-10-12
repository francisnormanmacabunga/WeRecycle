<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
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

      switch ($guard)
      {
        case 'admin':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('admin.dashboard');
          }
          break;

          case 'donor':
            if (Auth::guard($guard)->check()) {
              return redirect()->route('donor.dashboard');
            }
            break;

            case 'activitycoordinator':
              if (Auth::guard($guard)->check()) {
                return redirect()->route('ac.dashboard');
              }
              break;

              case 'programdirector':
                if (Auth::guard($guard)->check()) {
                  return redirect()->route('pd.dashboard');
                }
                break;

        default:
          if (Auth::guard($guard)->check())
          {
            return redirect()->route('/home');
          }
          break;
      }
      return $next($request);
    }
}
