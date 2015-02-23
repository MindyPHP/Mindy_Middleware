<?php

namespace Mindy\Middleware;

use Mindy\Http\Request;

/**
 * Class AjaxRedirectMiddleware
 * @package Mindy\Middleware
 */
class AjaxRedirectMiddleware extends Middleware
{
    public function processResponse(Request $request)
    {
        if ($request->getIsPost() && $request->getIsAjax()) {
            header("Location: " . $request->getPath());
            header("HTTP/1.1 278 OK", true, 278);
        }
    }
}
