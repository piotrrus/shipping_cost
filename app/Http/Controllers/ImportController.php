<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

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
        return view('calculation-form', ['postcodes' => $postCodes]);
    }
}
