<?php

namespace App\Constants;
use App\Constants\Attributes;

class ResponseMessages
{
    static function SUCCESS_MGS(string $msg, $data)
    {
       return response()->json([
            'message'   => $msg,
            'data'     => $data
        ], Attributes::CONTACT_API_CODE);
    }
}
