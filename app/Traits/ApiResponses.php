<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

/**
 * Helper trait to standardize Api's responses
 */
trait ApiResponses
{

    /**
     * Emits a simple JSON response.
     *
     * @param int    $status  Http status response
     * @param string $message    Message to be responded
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function response(int $status, string $message = null): JsonResponse
    {
        $response = [
            'status' => $status
        ];
        if (! is_null($message)) {
            $response['message'] = $message;
        }
        return response()->json($response, $status);
    }

    /**
     * Emits a data JSON response.
     *
     * @param array|object $data Data to be responded
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function responseData(array|object $data): JsonResponse
    {
        return response()->json([
            'status' => 200,
            'data'   => $data
        ]);
    }

    /**
     * Emits an error JSON response.
     *
     * @param string $code    Error code
     * @param string $message Error message
     * @param int    $errors  List of other else errors
     * @param int    $status  Http status response
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function responseError(string $code, string|array $message, array $errors = [], int $status = 400): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'error'  => [
                'code'    => $code,
                'message' => $message
            ],
            'errors' => $errors
        ], $status);
    }
}