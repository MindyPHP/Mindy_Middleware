<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 09/08/16
 * Time: 17:04
 */

namespace Mindy\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AjaxRedirect
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        /** @var ResponseInterface $response */
        $response = $next($request, $response);
        if (
            strtoupper($request->getMethod()) === 'POST' &&
            $request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest'
        ) {
            header("HTTP/1.1 278 OK", true, 278);
            return $response->withStatus(278);
        }
        return $response;
    }
}