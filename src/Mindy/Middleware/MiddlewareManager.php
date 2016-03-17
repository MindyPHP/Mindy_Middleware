<?php

namespace Mindy\Middleware;

use Exception;
use Mindy\Helper\Creator;
use Mindy\Helper\Traits\Accessors;
use Mindy\Helper\Traits\Configurator;
use Mindy\Http\Request;
use Mindy\Middleware\Middleware\IMiddleware;

/**
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
     * @var array[]
     */
    public $middleware = [];
    /**
     * @var \Mindy\Middleware\Middleware\Middleware[]
     */
    private $_middleware = [];

    public function init()
    {
        foreach ($this->middleware as $middleware) {
            $this->_middleware[] = Creator::createObject($middleware);
        }
    }

    /**
     * @param Request $request
     * @param string $output
     */
    public function processView(Request $request, &$output)
    {
        foreach ($this->_middleware as $middleware) {
            $middleware->processView($request, $output);
        }
    }

    /**
     * @param Request $request
     */
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

    /**
     * @param Request $request
     */
    public function processResponse(Request $request)
    {
        foreach ($this->_middleware as $middleware) {
            $middleware->processResponse($request);
        }
    }
}
