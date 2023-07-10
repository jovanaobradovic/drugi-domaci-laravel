<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class ResponseController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function success($podaci, $poruka)
    {
        $response = [
            'success' => true,
            'data'    => $podaci,
            'message' => $poruka,
        ];

        return response()->json($response, 200);
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function error($porukaGreske, $nizGresaka = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $porukaGreske,
        ];

        if(!empty($nizGresaka)){
            $response['data'] = $nizGresaka;
        }

        return response()->json($response, $code);
    }
}
