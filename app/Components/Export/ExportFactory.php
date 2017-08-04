<?php

namespace App\Components\Export;


use Mockery\Exception;

class ExportFactory
{
    public static function build ($type)
    {
        $format = "\App\Components\Export\Format\\" . ucfirst($type);

        if (class_exists($format)) {
            return  new $format;
        } else {
            throw new \Exception('No export to this format!');
        }
    }
}