<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Helpers\CsvFile;

class HomeController extends BaseController
{

    public function index()
    {
        return view('calculation-form');
    }
}
