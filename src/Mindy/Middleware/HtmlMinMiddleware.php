<?php

namespace Mindy\Middleware;

use Mindy\Http\Request;

/**
 * Class HtmlMinMiddleware
 * @package Mindy\Middleware
 */
class HtmlMinMiddleware extends Middleware
{
    public $spaceless = true;

    public function processView(Request $request, &$output)
    {
        if ($this->spaceless) {
            $output = trim(preg_replace('/>\\s+</', '><', $output));
        } else {
            $output = preg_replace('~>\s+<~', '><', $output);
            $output = preg_replace('/\s\s+/', ' ', $output);
            $i = 0;
            while ($i < 5) {
                $output = str_replace('  ', ' ', $output);
                $i++;
            }
        }
    }
}
