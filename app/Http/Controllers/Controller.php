<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function sendError(string $message, array $data, int $statusCode = 400)
    {
        return response()->json([
            'success'       =>      true,
            'message'       =>      $message,
            'data'          =>      $data
        ], $statusCode);
    }
    
    public function sendResponse(string $message, array $data, int $statusCode = 400)
    {
        return response()->json([
            'success'       =>      true,
            'message'       =>      $message,
            'data'          =>      $data
        ], $statusCode);
    }
}
