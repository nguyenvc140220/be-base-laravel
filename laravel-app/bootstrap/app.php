<?php

use App\Http\Exceptions\ApiExceptionHandler;
use App\Http\Middleware\ApiAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: [
            __DIR__ . '/../routes/api.v1.php',
            __DIR__ . '/../routes/api.v2.php',
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => ApiAuthMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $exception, $request) {
            if ($request->is('api/*')) {
                return app(ApiExceptionHandler::class)->renderApiException($exception);
            }

            return parent::render($request, $exception);
        });
    })->create();
