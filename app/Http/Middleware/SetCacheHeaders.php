<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetCacheHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Check if it's a static asset
        if ($this->isStaticAsset($request)) {
            $response->header('Cache-Control', 'public, max-age=31536000'); // 1 year
        }

        return $response;
    }

    private function isStaticAsset(Request $request)
    {
        $path = $request->path();
        return preg_match('/\.(css|js|png|jpg|jpeg|gif|svg|woff|woff2|ttf|eot)$/i', $path);
    }
}
