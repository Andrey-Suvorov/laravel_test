<?php

namespace App\Components\Export\Format;

use App\Components\Export\ExportInterface;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class Csv implements ExportInterface
{
    public function export(array $list)
    {

        $filename=date('Y-m-d').".csv";
        $file_path=base_path().'/public/'.$filename;
        $file = fopen($file_path,"w+");
        foreach ($list as $row) {
            fputcsv($file, $row);
        }
        fclose($file);

        return $file_path;
    }
}