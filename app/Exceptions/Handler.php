<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use stdClass;

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
    public function render($request, Exception $exception)
    {
        $url = $request->fullUrl();

        $message = $exception->getMessage();
        $exception_code = $exception->getCode();
        $status_code = Response::HTTP_BAD_REQUEST;

        if($message == ""){
            if($exception->getStatusCode() == Response::HTTP_NOT_FOUND){
                $message = "The requested url is not found on this server";
            }elseif($exception->getStatusCode() == Response::HTTP_METHOD_NOT_ALLOWED){
                $message = "The requested method is not found on this server";
            }else{
                $message = "There is an error on this server";
            }
            $status_code = $exception_code = ($exception->getStatusCode() != "0") ? $exception->getStatusCode() : Response::HTTP_NOT_FOUND;
        }

        if(strpos($url, '/api')){
            return response()->json([
                'status' => false,
                'message' => $exception_code.' - '.$message,
                'data' => new stdClass()
            ], $status_code);
        }else{
            return parent::render($request, $exception);
        }

        //return parent::render($request, $exception);
    }
}
