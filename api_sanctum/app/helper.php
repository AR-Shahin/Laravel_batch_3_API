<?php

function sendSuccessResponse($data, $mgs = 'Data Retrieve Successfully', $code = 200)
{
    return response()->json([
        'success' => true,
        'message' => $mgs,
        'code' => $code,
        'result' => $data
    ], $code);
}


function sendErrorResponse($data = [], $mgs = 'Something Went Wrong!', $code = 500)
{
    return response()->json([
        'success' => false,
        'message' => $mgs,
        'code' => $code,
        'result' => $data
    ], $code);
}
