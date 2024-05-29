<?php

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // only on Production
        if(App::environment('production')) {
            if ($exceptions instanceof \Illuminate\Session\TokenMismatchException) {
                return redirect('/')->with('message', 'Your session has expired. Please try again.');
            }
        }
    })->create();
