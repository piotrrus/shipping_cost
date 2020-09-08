<?php
$myfile = "../../public/zones.csv";

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
