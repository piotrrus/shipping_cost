<?php

namespace App\Helpers;

use App\Interfaces\FilesInterface;

class CsvFile implements FilesInterface
{
    const ZONE_COLUMMN = 0;
    const CODE_COLUMMN = 1;

    /**
     * return
     * @param type $file
     * @return array
     */
    public function getFile($file)
    {
        $row          = 1;
        $importedData = [];

        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                for ($c = 0; $c <= count($data) - 1; $c++) {
                    if ($c == self::ZONE_COLUMMN) {
                        $importedData[$row]['zone'] = $data[$c];
                    } elseif ($c == self::CODE_COLUMMN) {
                        $importedData[$row]['code'] = $data[$c];
                    }
                }
                $row++;
            }
            fclose($handle);
        }
        return $importedData;
    }
}
