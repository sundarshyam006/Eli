<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class APIAuth
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
        $key = $request->header('X-Access-Key');
        $screct = $request->header('X-Access-Screct');
        if( $key == 'Eli' && $screct == 'Eli@1234' ) {
            return $next($request);
        } else {
            $response['error'] = true;
            $response['data']['MESSAGE'] = 'Access Denied';
            $response['data']['ERR_CODE'] = 'Invalid Access Code.';
            return response()->json($response, 413);
        }
    }
}
