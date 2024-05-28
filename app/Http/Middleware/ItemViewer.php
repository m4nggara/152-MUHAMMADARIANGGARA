<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Item;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemViewer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        # TODO: saat ini setiap buka item, ditambahkan data viewer 1
        #       kedepan untuk masing2 ip akan dicek setiap hari hanya menambah 1 viewer
        Viewer::create([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'item_id' => Item::withTrashed()->where('slug','=',$request->slug)->first()->id,
            'user_admin' => $request->user() != null ? $request->user()->id : null,
            'previous_url' => session()->get('previousUrl'),
            'created_at' => now(),
            'created_by' => 'system'
        ]);
        return $next($request);
    }
}
