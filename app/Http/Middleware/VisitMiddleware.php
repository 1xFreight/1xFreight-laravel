<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $visit = Visit::where('ip', $request->ip())->where('year', date('Y'))->where('month', date('m'))->where('day', date('d'))->first();
        if (empty($visit)) {
            $newVisit = new Visit;
            $newVisit->ip = $request->ip();
            $newVisit->year = date("Y");
            $newVisit->month = date("m");
            $newVisit->day = date("d");
            $newVisit->save();
        }
        return $next($request);
    }
}
