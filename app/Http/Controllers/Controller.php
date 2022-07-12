<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * send response to user.
     *
     * @return json
     */
    public function toJson($result = [], $message = '', $status = true, $code = 200)
    {
        return response()->json([
            'status' => $status,
            'result' => !empty($result) ? $result : new \stdClass(),
            'message' => $message,
        ], $code, [], JSON_PRESERVE_ZERO_FRACTION);
    }

    /**
     * send error to user.
     *
     * @return json
     */
    public function sendApiError($error = '', $hint = '', $code = 400)
    {
        $response = [
            'message' => $error,
            'hint' => $hint,
            'status' => false,
        ];
        return response()->json($response, $code);
    }
}
