<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    const ERROR_VALIDATION_DATA = 'Error validation data';
    const ERROR_SAVING_DATA     = 'Error during saving data';
    const SAVING_DATA_OK        = 'Data saved successfully';
    const DATA_NOT_FOUND        = 'Data not found';

    /**
     * 
     * @param string $error
     * @return json response
     */
    public function errorValidatioData(string $error)
    {
        $resp = [
            'error' => self::ERROR_VALIDATION_DATA,
            'message' => $error
        ];

        return response()->json($resp, 400);
    }

    public function message($response)
    {
        if (!$response) {
            return $this->savingDataOK();
        } else {
            return $this->errorSavingData();
        }
    }

    private function errorSavingData()
    {
        $resp = [
            'success' => false,
            'message' => self::ERROR_SAVING_DATA
        ];
        return response()->json($resp, 400);
    }

    private function savingDataOK()
    {
        $resp = [
            'success' => true,
            'message' => self::SAVING_DATA_OK
        ];
        return response()->json($resp, 200);
    }

    public function response($modelData, $type)
    {
        if (!$modelData) {
            return $this->sendError(self::DATA_NOT_FOUND);
        }
        return $this->sendResponse($modelData, $type);
    }

    /**
     * success response method.
     *
     * @return json \Illuminate\Http\Response
     */
    private function sendResponse($result, $type)
    {
        $response = [
            'success' => true,
            'type' => $type,
            'data' => ['attributes' => $result]
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     * @param string $error
     * @param type $errorMessages
     * @param type $code
     * @return json \Illuminate\Http\Response
     */
    private function sendError(string $error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
