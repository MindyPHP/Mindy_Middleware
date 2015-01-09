<?php

namespace Mindy\Middleware;

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
 * @date 11/04/14.04.2014 16:48
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
