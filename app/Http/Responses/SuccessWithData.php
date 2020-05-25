<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class SuccessWithData implements Responsable
{
    private $data;

    private $status;

    public function __construct($data, $status = 200)
    {
        $this->data = $data;
        $this->status = $status;
    }

    public function toResponse($request)
    {
        return response()->json([
            'success' => true,
            'data' => $this->data,
        ], $this->status);
    }
}
