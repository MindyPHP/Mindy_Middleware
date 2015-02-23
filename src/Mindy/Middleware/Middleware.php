<?php

namespace Mindy\Middleware;

use Exception;
use Mindy\Http\Request;

/**
 * Class Middleware
 * @package Mindy\Middleware
 */
abstract class Middleware implements IMiddleware
{
    public function processRequest(Request $request)
    {

    }

    /**
     * Event owner RenderTrait
     * @param \Mindy\Http\Request $request
     * @param $output string
     */
    public function processView(Request $request, &$output)
    {
    }

    public function processException(Exception $exception)
    {

    }

    public function processResponse(Request $request)
    {
    }
}
