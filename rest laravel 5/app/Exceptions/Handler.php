<?php namespace App\Exceptions;

use Exception;
use Redirect;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
	//	return parent::render($request, $e);
		if($this->isHttpException($e))
        {
     /*   	switch ($e->getStatusCode()) {
        		// not found
        		case 404:
					return \Response::view('errors.503',404);
        		break;
        		// internal error
        		case '500':
				    return \Response::view('custom.500',500);	
        		break;
 
        		default:
	        		return $this->renderHttpException($e);
        		break;
        	} */
        	return Redirect::to('login');
        }
        else
        {
            return parent::render($request, $e);
        }
	}

}
