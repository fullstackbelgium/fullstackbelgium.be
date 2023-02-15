<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Whoops\Handler\HandlerInterface;

class Handler extends ExceptionHandler
{
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
     *
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
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
