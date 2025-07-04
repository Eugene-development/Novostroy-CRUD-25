<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

class GzipMiddleware
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
        $response = $next($request);
        $content = $response->content();
        $data = gzencode($content, 9);

        // return response($data);

        return response($data)->withHeaders([
            // 'Access-Control-Allow-Origin' => '*',
            // 'Access-Control-Allow-Methods' => 'POST',
            'Content-type' => 'application/json; charset=utf-8',
            'Content-Length' => strlen($data),
            'Content-Encoding' => 'gzip'
        ]);
    }
}
