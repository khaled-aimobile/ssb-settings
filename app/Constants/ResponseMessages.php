<?php

namespace App\Constants;
use App\Constants\Attributes;
use Illuminate\Support\Facades\Log;
use Psr\Log\LoggerInterface;
use RuntimeException;
class ResponseMessages
{
    static function SUCCESS_MGS(string $msg, $data)
    {
       return response()->json([
            'message'   => $msg,
            'data'     => $data
        ], Attributes::CONTACT_API_CODE);
    }
    static function ERRORS_MGS(string $e )
    {
       Log::error($e);
       return response()->json([
            'error' => [
                'description' => $e->getMessage()
            ]
        ], Attributes::SERVER_ERROR);
    }
}
