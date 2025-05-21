<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Redirect;

class RedirectIfMatched
{
    public function handle(Request $request, Closure $next)
    {
        // احصل على المسار بدون الدومين (مثلاً: /رابط-قديم)
        $path = '/' . ltrim(urldecode($request->path()), '/');

        // البحث فقط عن التوجيهات المفعلة
        $redirect = Redirect::where('source_url', $path)
                            ->where('active', true)
                            ->first();

        if ($redirect) {
            return redirect($redirect->target_url, $redirect->status_code)
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', '0');
        }

        return $next($request);
    }
}
