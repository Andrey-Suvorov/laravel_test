<?php

namespace App\Components\Export;


class Export implements ExportInterface
{
    protected $exporter;

    public function __construct($type)
    {
        $this->exporter = ExportFactory::build($type);
    }

    public function export(array $list)
    {
        return $this->exporter->export($list);
    }

}