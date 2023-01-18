<?php
namespace App\Trait;
trait HttpRequest{

    public function success($data, $message, $code = 200)
    {
        return response()->json([
           'data'=>$data,
            'message'=>$message,
            'status'=>'request is successful'
        ], $code);
    }

    public function error($data, $message, $code)
    {
        return response()->json([
            'data'=>$data,
            'message'=>$message,
            'status'=>'request failed'
        ], $code);
    }
}
