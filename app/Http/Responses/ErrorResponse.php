<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class ErrorResponse implements Responsable
{
    private $msg;

    private $status;

    public function __construct($msg, $status = 400)
    {
        $this->msg  = $msg;
        $this->status  = $status;
    }

    public function toResponse($request)
    {
        return response()->json([
            'success' => false,
            'msg' => $this->msg,
        ], $this->status);
    }
}
