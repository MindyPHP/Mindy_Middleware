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
        if ($request->getIsAjax() && in_array($request->getStatusCode(), [301, 302])) {
            header("Location: " . $request->getPath());
            header("HTTP/1.1 278 OK", true, 278);
        }
    }
}
