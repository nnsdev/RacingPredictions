<?php

namespace App\Http\Middleware;

use Closure;

class RaceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
/*         $race = \App\Models\Race::findOrFail($request->route('race'));
if (now()->lessThan($race->race_start->subWeek())) {
return redirect('/dashboard');
}
if (now()->greaterThan($race->race_end)) {
return redirect('/race/' . $race->id . '/results');
} */
        return $next($request);
    }
}
