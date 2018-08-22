<?php

namespace Beyondcode\TinkerTool\Http\Middleware;

use Beyondcode\TinkerTool\Tinker;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(Tinker::class)->authorize($request) ? $next($request) : abort(403);
    }
}
