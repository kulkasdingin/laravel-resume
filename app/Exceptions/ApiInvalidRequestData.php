<?php

namespace App\Exceptions;

use Exception;

class ApiInvalidRequestData extends Exception
{

    public function render($request)
    {

        if (!$this->message) {
            $this->message = "Invalid request data";
        } elseif (json_decode($this->message)) {
            $this->message = json_decode($this->message);
        }

        return response()->json([
            'detail' => $this->message,
        ], 400);
    }
}
