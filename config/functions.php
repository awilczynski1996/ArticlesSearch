<?php

function d($var, $caller = null)
{
    if(!isset($caller)) {
        $helper = debug_backtrace(1);
        $caller = array_shift($helper);
    }
    echo '<code>File: ' . $caller['file'] . ' / Line: ' . $caller['line'] . '</code>';
    echo '<pre>';
    yii\helpers\VarDumper::dump($var, 10, true);
    echo '</pre>';
}

function dd($var)
{
    $helper = debug_backtrace(1);
    $caller = array_shift($helper);
    d($var, $caller);
    die();
}