<?php

namespace Mindy\Middleware;

use Exception;
use Mindy\Helper\Creator;
use Mindy\Helper\Traits\Accessors;
use Mindy\Helper\Traits\Configurator;
use Mindy\Http\Request;

/**
 *
 *
 * All rights reserved.
 *
 * @author Falaleev Maxim
 * @email max@studio107.ru
 * @version 1.0
 * @company Studio107
 * @site http://studio107.ru
 * @date 11/04/14.04.2014 16:47
 */
class MiddlewareManager implements IMiddleware
{
    use Configurator, Accessors;

    /**
     * @var Middleware[]
     */
    public $middleware = [];

    /**
     * @var Middleware[]
     */
    private $_middleware = [];

    public function init()
    {
        foreach ($this->middleware as $middleware) {
            $this->_middleware[] = Creator::createObject($middleware);
        }
    }

    public function processView(Request $request, &$output)
    {
        foreach ($this->_middleware as $middleware) {
            $middleware->processView($request, $output);
        }
    }

    public function processRequest(Request $request)
    {
        foreach ($this->_middleware as $middleware) {
            $middleware->processRequest($request);
        }
    }

    /**
     * @param Exception $exception
     * @void
     */
    public function processException(Exception $exception)
    {
        foreach ($this->_middleware as $middleware) {
            $middleware->processException($exception);
        }
    }

    public function processResponse(Request $request)
    {
        foreach ($this->_middleware as $middleware) {
            $middleware->processResponse($request);
        }
    }
}
