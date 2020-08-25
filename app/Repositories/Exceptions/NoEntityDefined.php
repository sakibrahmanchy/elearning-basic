<?php

namespace App\Repositories\Exceptions;

use Exception;

class NoEntityDefined extends Exception
{
    
    public function render($request)
    {
        return response()->json(['message' => 'oauth.emailTaken'], 400);
    }
}