<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * @param $message
     * @param null $data
     * @param $statusCode
     * @param bool $isSuccess
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description Api response function
     */
    public function sendResponse($message, $data = null, $statusCode, bool $isSuccess = true): \Illuminate\Http\JsonResponse
    {
        //check if params are exists
        if(!$message) {
            return response()->json(['message' => 'Message is required'], 500);
        }

        // Send the response accordingly
        if ($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'status' => $statusCode,
                'results' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'status' => $statusCode,
            ], $statusCode);
        }
    }

    /**
     * @param $message
     * @param $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description API success response
     */
    public function successResponse($message, $data, int $statusCode = 200): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse($message, $data, $statusCode);
    }

    /**
     * @param $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     * @author mohamedmunshif
     * @description API failed or error response
     */
    public function errorResponse($message, int $statusCode = 500): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse($message, null, $statusCode, false);
    }
}
