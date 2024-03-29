<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    // public function render($request, Exception $exception)
    // {
    //     return parent::render($request, $exception);

    // }
    public function render($request, Exception $e)
    {
        if ($this->isHttpException($e)) {
            switch ($e->getStatusCode()) {
                    // not found
                case 404:
                    return $this->handleOldUrls();
                    break;
                default:
                    return $this->renderHttpException($e);
                    break;
            }
        } else {
            return parent::render($request, $e);
        }
    }
    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }

    public function handleOldUrls()
    {
        $currentUrl = urldecode(request()->getRequestUri());

        $contains = Str::contains($currentUrl, 'عقارات-للايجار/شقق-للبيع');
        if ($contains) {
            $currentUrl = str_replace('/عقارات-للايجار', '', $currentUrl);
        }

        if (!$contains) {
            $contains = Str::contains($currentUrl, 'عقارات-للايجار/شقق-للايجار');
            if ($contains) {
                $currentUrl = str_replace('/عقارات-للايجار', '', $currentUrl);
            }
        }

        if ($contains) {
            $newUrl = url('/') . $currentUrl;
            return redirect($newUrl);
        } else {
            return response()->view('errors.404', [], 404);
        }
    }
}
