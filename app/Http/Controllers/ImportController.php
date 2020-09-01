<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Helpers\CsvFile;

class ImportController extends BaseController
{

    public function index()
    {
        return view('home');
    }

    public function import()
    {
        $file      = new CsvFile();
        $fileName  = $_FILES['file']['tmp_name'];
        $postCodes = $file->getFile($fileName);
        return view('import-result', ['postcodes' => $postCodes]);
    }
}
