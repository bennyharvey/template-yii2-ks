<?php

namespace common\models;

class CsvHelper
{
    public static function fileToArray(string $filename, string $delimiter=','): array
    {
        if(!file_exists($filename) || !is_readable($filename))
            return false;
    
        $header = null;
        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }

    public static function writeToFile(string $filename, array $array): void
    {
        $fp = fopen($filename, 'w');
        
        foreach ($array as $row) {
            fputcsv($fp, $row);
        }
    }
}