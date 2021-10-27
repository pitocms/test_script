<?php

declare(strict_types=1);

namespace App\CommissionTask\Service;

class Csv
{
    public static function import(string $filename)
    {
        $data = [];
        $file = new \SplFileObject($filename);
        while (!$file->eof()) {
            $data[] = $file->fgetcsv();
        }
        return $data;
    }
}
