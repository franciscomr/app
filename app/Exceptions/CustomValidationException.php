<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;

class CustomValidationException extends Exception
{
    public function __construct(
        string $message,
        int $code,
    ) {
        parent::__construct($message, $code);
    }

    public function render(Request $request)
    {
        if ($request->isJson()) {
            return response()->json([
                'val' => $this->message,
                'code New' => $this->code
            ]);
        }
    }
}
