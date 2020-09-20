<?php

namespace App\Exceptions;


use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
//    public function render($request, Throwable $exception)
//    {
//        return parent::render($request, $exception);
//    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException)
        {
            // Do your stuff here
            return response()->json(['message' => 'Nəticə tapılmadı','status' => 'fail'] );
        }
        if($exception instanceof AuthenticationException){
            return response()->json(['message' => 'Sayta daxil olunmayıb'],401);
        }
        return parent::render($request, $exception);
    }

//    protected function unauthenticated($request, AuthenticationException $exception)
//    {
//        if ($request->expectsJson()) {
//            return response()->json(['error' => 'Unauthenticated.'], 401);
//        }
//    }
}
