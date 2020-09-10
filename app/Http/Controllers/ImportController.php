<?php

namespace App\Http\Controllers;

/**
 * Description of ImportController
 *
 * @author piotrek
 */
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Helpers\CsvFile;

class ImportController
{

    public function import()
    {
        $myfile = "public/zones.csv";

        $row          = 1;
        $importedData = [];

        if (($uchwyt = fopen($myfile, "r")) !== FALSE) {
            while (($data = fgetcsv($uchwyt, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    if ($c == 0) {
                        $importedData[$row]['zone'] = $data[$c];
                    } else if ($c == 1) {
                        $importedData[$row]['code'] = $data[$c];
                    }
                }
            }
            echo json_encode($importedData);
            fclose($uchwyt);
        }
    }
}
