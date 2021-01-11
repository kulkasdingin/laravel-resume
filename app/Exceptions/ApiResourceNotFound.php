<?php

namespace App\Exceptions;

use Exception;

class ApiResourceNotFound extends Exception
{

    public function render($request)
    {

        if (!$this->message) {
            $this->message = "Resource not found";
        } elseif (json_decode($this->message)) {
            $this->message = json_decode($this->message);
        }

        return response()->json([
            'detail' => $this->message,
        ], 404);
    }
}
