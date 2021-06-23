<?php 

namespace App\Http\Concerns;

use Illuminate\Http\JsonResponse;

trait ResponseJsonTrait {

    public function sendResponse($result, $message):JsonResponse
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

     public function sendError($error, $errorMensages = [], $code = 404):JsonResponse
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