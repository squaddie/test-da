<?php

namespace App\Http\Middleware\Responses;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class JsonResponseMiddleware
 * @package App\Http\Middleware\Responses\JsonResponseMiddleware
 */
class JsonResponseMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
