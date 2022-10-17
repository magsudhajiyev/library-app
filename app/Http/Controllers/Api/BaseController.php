<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    public function jsonResponse($data, $status): JsonResponse
    {
        return response()->json($data, $status);
    }
}
