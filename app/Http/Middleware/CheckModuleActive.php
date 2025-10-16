<?php

namespace App\Http\Middleware;

use App\Models\Module;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $module = DB::select('SELECT * FROM user_modules WHERE module_id = ?', [$request->route('id')])[0];
        if($module->active == false){
            return response()->json(["error" => "Module inactive. Please activate this module to use it." ], 403);
        }
        return $next($request);
    }
}
