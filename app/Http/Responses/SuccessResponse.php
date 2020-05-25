<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class SuccessResponse implements Responsable
{
    private $msg;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    public function toResponse($request)
    {
        return response()->json([
            'success' => true,
            'msg' => $this->msg,
        ], 200);
    }
}
