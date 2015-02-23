<?php

namespace Mindy\Middleware;

use Exception;
use Mindy\Http\Request;

/**
 * Interface IMiddleware
 * @package Mindy\Middleware
 */
interface IMiddleware
{
    public function processRequest(Request $request);

    /**
     * Event owner RenderTrait
     * @param \Mindy\Http\Request $request
     * @param $output string
     */
    public function processView(Request $request, &$output);

    /**
     * @param Exception $exception
     * @void
     */
    public function processException(Exception $exception);

    /**
     * @param Request $request
     * @return mixed
     */
    public function processResponse(Request $request);
}
