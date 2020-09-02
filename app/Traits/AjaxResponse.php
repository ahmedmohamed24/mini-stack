<?php

namespace App\Traits;

trait AjaxResponse{
    public function response($status, $msg=null, $data=null){
        return response()->json([
            'status'=>$status,
            'msg'=>$msg,
            'data'=>$data,
        ]);
    }
}
