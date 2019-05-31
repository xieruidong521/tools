<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class MaintenanceMode
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
        if(!$request->is('admin/*')&&app()->isDownForMaintenance())
        {
            $down=json_decode(file_get_contents(storage_path('framework/down')));
            header('Retry-After:'.Carbon::now()->addDay());
            abort(503,$down->message?:'now is maintenance mode');
        }
        return $next($request);
    }
}
