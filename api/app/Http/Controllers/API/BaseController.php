<?php 

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class BaseController extends Controller {
    /**
     * Success response method
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($response,200);
    }

    /**
     * return error response
     * 
     * @return \Illuminate\Http\Response
     */

     public function sendError($error, $errorMensages = [], $code = 404)
     {
        $response = [
            'success' => false, 
            'message' => $error
        ];

        if(!empty($errorMensages)){
            $response['data'] = $errorMensages;
        }

        return response()->json($response, $code);

     }
}