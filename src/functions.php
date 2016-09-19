<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 19/09/16
 * Time: 19:34
 */

use Mindy\VarDumper\SimpleDumper;
use Mindy\VarDumper\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\VarDumper;

VarDumper::setHandler(function ($var) {
    $cloner = new VarCloner();
    $dumper = 'cli' === PHP_SAPI ? new CliDumper() : new HtmlDumper();

    $dumper->dump($cloner->cloneVar($var));
});

if (!function_exists('debug')) {
    function debug()
    {
        $debug = debug_backtrace();
        $data = [
            'data' => func_get_args(),
            'debug' => [
                'file' => isset($debug[0]['file']) ? $debug[0]['file'] : null,
                'line' => isset($debug[0]['line']) ? $debug[0]['line'] : null,
            ]
        ];
        VarDumper::dump($data);
    }
}

if (!function_exists('debug_die')) {
    function debug_die()
    {
        debug(func_get_args());
        die();
    }
}

if (!function_exists('d')) {
    function d()
    {
        $debug = debug_backtrace();
        $data = [
            'data' => func_get_args(),
            'debug' => [
                'file' => isset($debug[0]['file']) ? $debug[0]['file'] : null,
                'line' => isset($debug[0]['line']) ? $debug[0]['line'] : null,
            ]
        ];
        SimpleDumper::dump($data);
    }
}