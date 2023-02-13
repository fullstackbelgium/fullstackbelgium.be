<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Whoops\Handler\HandlerInterface;

class Handler extends ExceptionHandler
{
    /**
     * A list of exceptions with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     */
    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render(Request $request, Throwable $exception): Response
    {
        return parent::render($request, $exception);
    }

    // /**
    //  * Get the Whoops handler for the application.
    //  *
    //  * @return \Whoops\Handler\HandlerInterface
    //  */
    // protected function whoopsHandler()
    // {
    //     try {
    //         return app(HandlerInterface::class);
    //     } catch (BindingResolutionException $e) {
    //         return parent::whoopsHandler();
    //     }
    // }
}
