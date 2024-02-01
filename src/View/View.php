<?php

namespace App\View;

use League\Plates\Engine;

class View
{
    protected static $plates;

    public static function render($template, $data = [])
    {
        if (self::$plates === null) {
            self::$plates = new Engine(__DIR__ . "/../../templates");
        }

        return self::$plates->render($template, $data);
    }
}